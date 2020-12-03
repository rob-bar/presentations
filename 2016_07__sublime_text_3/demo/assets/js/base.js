(function() {
  var app, helper, site;

  helper = {
    vent: _.extend({}, Backbone.Events),
    templates: this.templates,
    MyView: Backbone.View.extend({
      events: {
        "click .up, .down": "scroll"
      },
      scroll: function(e) {
        e.preventDefault();
        return helper.scroll_to("." + ($(e.currentTarget).data('to')));
      },
      template: function(name) {
        return helper.templates[name];
      },
      initialize: function(options) {
        this.tname = options.template;
        this.key = options.key;
        return this.render();
      },
      render: function() {
        var json, template, totop;
        template = this.template(this.tname);
        json = this.model.get("site");
        totop = json.main;
        this.$el.html(template(_.extend(json[this.key], totop)));
        return this;
      }
    }),
    track_event: function(category, label, value) {
      var err;
      try {
        if ((label != null) && (value != null)) {
          return _gaq.push(['_trackEvent', category, label, value]);
        } else if (label != null) {
          return _gaq.push(['_trackEvent', category, label]);
        } else {
          return _gaq.push(['_trackEvent', category]);
        }
      } catch (_error) {
        err = _error;
      }
    },
    track_page: function(frag) {
      var _gaq;
      _gaq = window._gaq || [];
      return _gaq.push(['_trackPageview', "/" + frag]);
    },
    scroll_to: function(target) {
      var destination, speed, topoffset;
      if ($(target).offset() != null) {
        topoffset = 70;
        speed = 600;
        destination = $(target).offset().top - topoffset;
        $('html:not(:animated),body:not(:animated)').animate({
          scrollTop: destination
        }, speed, function() {
          return $(document).scrollTop(destination);
        });
      }
      return false;
    },
    unscroll: function() {
      return $('.banner ul li').css("background-position", "center 0px");
    },
    scroll: function(e) {
      var top;
      top = $(window).scrollTop();
      return $('.banner ul li').css("background-position", "center -" + (top / 5) + "px");
    }
  };

  app = {
    views: {},
    models: {},
    Copy: Backbone.Model.extend({
      url: function() {
        return "assets/json/" + this.lang + ".json";
      },
      initialize: function(options) {
        return this.lang = options.lang;
      }
    }),
    Header: helper.MyView.extend({
      tagName: "header",
      events: {
        "click .sub .lang li a": "changelang"
      },
      changelang: function(e) {
        e.preventDefault();
        return helper.vent.trigger("navigate_to", $(e.currentTarget).attr("href"));
      }
    }),
    Banner: helper.MyView.extend({
      className: "banner",
      interval: 7500,
      initialize: function(options) {
        this.tname = options.template;
        this.key = options.key;
        this.render();
        return this.initslideshow();
      },
      initslideshow: function() {
        var _this = this;
        this.$el.find("ul li:last").addClass("behindto");
        return setInterval(function() {
          return _this.newslide(_this.$el);
        }, this.interval);
      },
      newslide: function($el) {
        var height, to_animate;
        height = $el.height();
        to_animate = $el.find("ul li:last");
        to_animate.prev().addClass("behindfrom");
        to_animate.addClass("animatefrom");
        to_animate.prev().addClass("behind");
        to_animate.addClass("animate");
        setTimeout(function() {
          return to_animate.addClass("animateto");
        }, 400);
        setTimeout(function() {
          return to_animate.prev().addClass("behindto");
        }, 650);
        return setTimeout(function() {
          to_animate.prev().removeClass("behind behindfrom");
          to_animate.removeClass("animate animateto animatefrom behindto");
          to_animate.remove();
          return $el.find("ul").prepend(to_animate);
        }, 3000);
      }
    }),
    Map: helper.MyView.extend({
      className: "map"
    }),
    Intro: helper.MyView.extend({
      className: "intro"
    }),
    General: helper.MyView.extend({
      className: "general"
    }),
    Reporting: helper.MyView.extend({
      className: "reporting"
    }),
    Summary: helper.MyView.extend({
      className: "summary"
    }),
    Credits: helper.MyView.extend({
      className: "credits"
    }),
    Video: helper.MyView.extend({
      className: "overlay videoplayer hidden",
      video: "",
      show: function(key) {
        var json;
        json = this.model.get("site");
        this.video = json.main.media[key];
        this.render();
        return this.$el.removeClass("hidden");
      },
      hide: function() {
        return this.$el.addClass("hidden");
      },
      render: function() {
        var template;
        template = this.template(this.tname);
        this.$el.html(template({
          video: this.video
        }));
        return this;
      }
    }),
    Slideshow: helper.MyView.extend({
      className: "overlay slideshowplayer hidden",
      id: "gal",
      gal_key: 0,
      gal: [],
      events: {
        "click .next": "next",
        "click .prev": "prev"
      },
      hammerEvents: {
        "swipeleft ul": "next",
        "swiperight ul": "prev"
      },
      show: function(key) {
        var json;
        this.gal_key = 0;
        json = this.model.get("site");
        this.gal = json.main.media[key];
        this.render();
        this.calc_gal();
        return this.$el.removeClass("hidden");
      },
      calc_gal: function() {
        var _this = this;
        this.$el.find("a.next").removeClass("hidden");
        this.$el.find("a.prev").removeClass("hidden");
        this.$el.find("ul li").each(function(i, e) {
          $(e).attr("class", "");
          if ($(e).data("key") === _this.gal_key) {
            return $(e).addClass("current");
          } else if ($(e).data("key") < _this.gal_key) {
            return $(e).addClass("past");
          } else if ($(e).data("key") > _this.gal_key) {
            return $(e).addClass("future");
          }
        });
        if (this.gal_key === this.$el.find("ul li:last").data("key")) {
          this.$el.find("a.next").addClass("hidden");
        }
        if (this.gal_key === this.$el.find("ul li:first").data("key")) {
          return this.$el.find("a.prev").addClass("hidden");
        }
      },
      prev: function(e) {
        e.preventDefault();
        if (this.gal_key > 0) {
          return this.calc_gal(--this.gal_key);
        }
      },
      next: function(e) {
        e.preventDefault();
        if (this.gal_key < this.$el.find("ul li:last").data("key")) {
          return this.calc_gal(++this.gal_key);
        }
      },
      render: function() {
        var template;
        template = this.template(this.tname);
        this.$el.html(template({
          gal: this.gal
        }));
        return this;
      }
    }),
    Router: Backbone.Router.extend({
      routes: {
        "": "index",
        ":lang": "lang"
      },
      initialize: function() {
        var _this = this;
        return helper.vent.on("navigate_to", function(url) {
          return _this.navigate(url, {
            trigger: true
          });
        });
      },
      index: function() {
        return this.langswitch("en-UK");
      },
      lang: function(lang) {
        return this.langswitch(lang);
      },
      langswitch: function(lang) {
        var _this = this;
        app.views.copy = new app.Copy({
          "lang": lang
        });
        return app.views.copy.fetch({
          success: function(model, response, options) {
            app.views.header = new app.Header({
              model: model,
              key: "header",
              template: "template-header"
            });
            app.views.banner = new app.Banner({
              model: model,
              key: "banner",
              template: "template-banner"
            });
            app.views.map = new app.Map({
              model: model,
              key: "map",
              template: "template-map"
            });
            app.views.intro = new app.Intro({
              model: model,
              key: "intro",
              template: "template-intro"
            });
            app.views.general = new app.General({
              model: model,
              key: "general",
              template: "template-general"
            });
            app.views.reporting = new app.Reporting({
              model: model,
              key: "reporting",
              template: "template-reporting"
            });
            app.views.summary = new app.Summary({
              model: model,
              key: "summary",
              template: "template-summary"
            });
            app.views.credits = new app.Credits({
              model: model,
              key: "credits",
              template: "template-credits"
            });
            $(".main").empty().append(app.views.header.el, app.views.banner.el, app.views.map.el, app.views.intro.el, app.views.general.el, app.views.reporting.el, app.views.summary.el, app.views.credits.el);
            if ($(".main").siblings("div").length === 0) {
              app.views.video = new app.Video({
                model: model,
                key: "video",
                template: "template-videoplayer"
              });
              app.views.gal = new app.Slideshow({
                model: model,
                key: "gal",
                template: "template-slideshowplayer"
              });
              return $(".main").before(app.views.video.el, app.views.gal.el);
            }
          }
        });
      }
    })
  };

  site = {
    page: $('body').attr('data-page'),
    index: function() {
      app.router = new app.Router();
      Backbone.history.start({
        pushState: true,
        hashChange: false
      });
      $('body').delegate(".overlay", "click", function(e) {
        e.preventDefault();
        if ($(e.target).hasClass("overlay") || $(e.target).hasClass("close")) {
          return $(e.currentTarget).addClass("hidden");
        }
      });
      $('.main').delegate(".open-overlay", "click", function(e) {
        var current, parent;
        e.preventDefault();
        parent = $(this).parent();
        current = $(e.currentTarget);
        if (parent.hasClass("slideshow")) {
          return app.views.gal.show(current.data("key"));
        } else {
          return app.views.video.show(current.data("key"));
        }
      });
      return enquire.register("screen and (min-width:1024px)", {
        match: function() {
          return $(window).on("scroll", helper.scroll);
        },
        unmatch: function() {
          $(window).off("scroll", helper.scroll);
          return helper.unscroll();
        }
      });
    }
  };

  $(function() {
    if (typeof site[site.page] === "function") {
      return site[site.page]();
    }
  });

}).call(this);

/*
//# sourceMappingURL=../../assets/js/base.js.map
*/
