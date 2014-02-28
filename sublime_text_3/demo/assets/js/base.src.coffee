helper =
  vent: _.extend {}, Backbone.Events
  templates: this.templates

  MyView: Backbone.View.extend
    events:
      "click .up, .down"     :   "scroll"

    scroll: (e) ->
      do e.preventDefault
      helper.scroll_to ".#{$(e.currentTarget).data 'to'}"

    template: (name) -> helper.templates[name]
    initialize: (options) ->
      @tname = options.template
      @key = options.key
      @render()

    render:() ->
      template = @template @tname
      json = @model.get "site"
      totop = json.main
      @$el.html template _.extend json[@key], totop
      @

  track_event: (category, label, value) ->
      try
        # console.log "track: category: #{category}  - label: #{label}  - value:  #{value}"
        if label? and value?
          _gaq.push ['_trackEvent', category, label, value]
        else if label?
          _gaq.push ['_trackEvent', category, label]
        else
          _gaq.push ['_trackEvent', category]
      catch err
        # console.log "couldn't track event: category: #{category}  - label: #{label}  - value:  #{value}"

  track_page: (frag) ->
    # console.log "track: page: frag: #{frag}"
    _gaq = window._gaq || []
    _gaq.push(['_trackPageview', "/#{frag}"])

  scroll_to: (target) ->
    if $(target).offset()?
      topoffset = 70
      speed = 600
      destination = $(target).offset().top - topoffset
      $('html:not(:animated),body:not(:animated)').animate(
        {scrollTop: destination}
        speed
        ->
          $(document).scrollTop(destination)
      )
    return false

  unscroll: ->
    $('.banner ul li').css "background-position", "center 0px"

  scroll: (e) ->
    top = $(window).scrollTop()
    $('.banner ul li').css "background-position", "center -#{top / 5}px"

app =
  views: {}
  models: {}

  Copy: Backbone.Model.extend
    url: -> "assets/json/#{@lang}.json"
    initialize: (options) -> @lang = options.lang

  Header: helper.MyView.extend
    tagName: "header"
    events:
      "click .sub .lang li a": "changelang"

    changelang: (e) ->
      do e.preventDefault
      helper.vent.trigger "navigate_to", $(e.currentTarget).attr "href"

  Banner: helper.MyView.extend
    className: "banner"
    interval: 7500

    initialize: (options) ->
      @tname = options.template
      @key = options.key
      @render()
      @initslideshow()

    initslideshow: ->
      @$el.find("ul li:last").addClass "behindto"
      setInterval =>
        @newslide @$el
      , @interval

    newslide: ($el) ->
      height = $el.height()
      to_animate = $el.find "ul li:last"

      to_animate.prev().addClass "behindfrom"
      to_animate.addClass "animatefrom"

      to_animate.prev().addClass "behind"
      to_animate.addClass "animate"

      setTimeout ->
        to_animate.addClass "animateto"
      , 400

      setTimeout ->
        to_animate.prev().addClass "behindto"
      , 650

      setTimeout ->
        to_animate.prev().removeClass "behind behindfrom"
        to_animate.removeClass "animate animateto animatefrom behindto"
        to_animate.remove()
        $el.find("ul").prepend to_animate
      , 3000

  Map: helper.MyView.extend
    className: "map"

  Intro: helper.MyView.extend
    className: "intro"

  General: helper.MyView.extend
    className: "general"

  Reporting: helper.MyView.extend
    className: "reporting"

  Summary: helper.MyView.extend
    className: "summary"

  Credits: helper.MyView.extend
    className: "credits"

  Video: helper.MyView.extend
    className: "overlay videoplayer hidden"
    video: ""

    show: (key) ->
      json = @model.get "site"
      @video = json.main.media[key]
      @render()
      @$el.removeClass "hidden"

    hide: -> @$el.addClass "hidden"

    render: ->
      template = @template(@tname)
      @$el.html template {video: @video}
      @

  Slideshow: helper.MyView.extend
    className: "overlay slideshowplayer hidden"
    id: "gal"
    gal_key: 0
    gal: []

    events:
      "click .next"   :   "next"
      "click .prev"   :   "prev"

    hammerEvents:
      "swipeleft ul"    :   "next"
      "swiperight ul"   :   "prev"

    show: (key) ->
      @gal_key = 0
      json = @model.get "site"
      @gal = json.main.media[key]
      @render()
      @calc_gal()
      @$el.removeClass "hidden"

    calc_gal: () ->
      @$el.find("a.next").removeClass "hidden"
      @$el.find("a.prev").removeClass "hidden"

      @$el.find("ul li").each (i, e) =>
        # cleanup
        $(e).attr "class", ""

        # settings
        if $(e).data("key") is @gal_key
          $(e).addClass "current"
        else if $(e).data("key") < @gal_key
          $(e).addClass "past"
        else if $(e).data("key") > @gal_key
          $(e).addClass "future"

      if @gal_key is @$el.find("ul li:last").data "key"
        @$el.find("a.next").addClass("hidden")

      if @gal_key is @$el.find("ul li:first").data "key"
        @$el.find("a.prev").addClass("hidden")

    prev: (e) ->
      do e.preventDefault
      if @gal_key > 0
        @calc_gal --@gal_key

    next: (e) ->
      do e.preventDefault
      if @gal_key < @$el.find("ul li:last").data "key"
        @calc_gal ++@gal_key

    render:() ->
      template = @template @tname
      @$el.html template {gal: @gal}
      @

  Router: Backbone.Router.extend
    routes:
      ""        :   "index"
      ":lang"   :   "lang"

    initialize: ->
      helper.vent.on "navigate_to", (url) => @navigate url, {trigger: true}

    index: -> @langswitch "en-UK"
    lang: (lang) -> @langswitch lang

    langswitch: (lang) ->
      app.views.copy = new app.Copy "lang": lang
      app.views.copy.fetch
        success: (model, response, options) =>
          app.views.header = new app.Header model: model, key: "header", template: "template-header"
          app.views.banner = new app.Banner model: model, key: "banner", template: "template-banner"
          app.views.map = new app.Map model: model, key: "map", template: "template-map"
          app.views.intro = new app.Intro model: model, key: "intro", template: "template-intro"
          app.views.general = new app.General model: model, key: "general", template: "template-general"
          app.views.reporting = new app.Reporting model: model, key: "reporting", template: "template-reporting"
          app.views.summary = new app.Summary model: model, key: "summary", template: "template-summary"
          app.views.credits = new app.Credits model: model, key: "credits", template: "template-credits"

          $(".main").empty().append app.views.header.el, app.views.banner.el, app.views.map.el, app.views.intro.el, app.views.general.el, app.views.reporting.el, app.views.summary.el, app.views.credits.el

          if $(".main").siblings("div").length is 0
            app.views.video = new app.Video model: model, key: "video", template: "template-videoplayer"
            app.views.gal = new app.Slideshow model: model, key: "gal", template: "template-slideshowplayer"

            $(".main").before app.views.video.el, app.views.gal.el

site =
  page: $('body').attr 'data-page'
  index: ->
    app.router = new app.Router()
    Backbone.history.start pushState: true, hashChange: false

    $('body').delegate ".overlay", "click", (e) ->
      do e.preventDefault
      if $(e.target).hasClass("overlay") or $(e.target).hasClass("close")
        $(e.currentTarget).addClass "hidden"

    $('.main').delegate ".open-overlay", "click", (e) ->
      do e.preventDefault
      parent = $(@).parent()
      current = $(e.currentTarget)

      if parent.hasClass "slideshow"
        app.views.gal.show current.data "key"
      else
        app.views.video.show current.data "key"


    enquire.register "screen and (min-width:1024px)",
      match : -> $(window).on "scroll", helper.scroll
      unmatch : ->
        $(window).off "scroll", helper.scroll
        do helper.unscroll

$ ->
  if typeof site[site.page] is "function"
    do site[site.page]
