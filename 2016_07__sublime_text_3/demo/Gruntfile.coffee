module.exports = (grunt) ->
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  # Project configuration.
  grunt.initConfig

    vendorlibs:[
      "assets/js/vendor/hammer.js",
      "assets/js/vendor/jquery.js",
      "assets/js/vendor/jquery.hammer.js",
      "assets/js/vendor/jquery.waypoints.js",
      "assets/js/vendor/underscore.js",
      "assets/js/vendor/backbone.js",
      "assets/js/vendor/backbone.hammer.js",
      "assets/templates/templates.js",
      "assets/js/base.js"
    ]

    # ------------------------------
    # TASKS
    # ------------------------------
    compass:
      app:
        options:
          require: ['compass-h5bp', 'ceaser-easing']
          sassDir: 'assets/sass'
          cssDir: 'assets/css'
          imagesDir: 'assets/img'
          fontsDir: 'assets/font'
          httpPath: '/'
          relativeAssets: true
          debugInfo: false
          outputStyle: 'expanded'
          noLineComments: true
          raw: 'preferred_syntax = :sass\n'

      deploy:
        options:
          require: ['compass-h5bp', 'ceaser-easing']
          sassDir: 'assets/sass'
          cssDir: 'assets/css'
          imagesDir: 'assets/img'
          fontsDir: 'assets/font'
          httpPath: '/'
          relativeAssets: true
          outputStyle: 'compressed'
          noLineComments: true
          raw: 'preferred_syntax = :sass\n'

    coffee:
      app:
        options:
          sourceMap: true
          bare: false
          join: true
        files:
          'assets/js/base.js': ['assets/coffee/**/*.coffee']

    jst:
      compile:
        options:
          namespace: "templates"
          prettify: true
          processName: (filename) ->
            name = filename.split("/")[2].split(".")[0]
            "template-#{name}"
        files:
          'assets/templates/templates.js': ['assets/templates/**/*.html']

    'i18next-yaml':
      en:
        src: 'assets/yml/en-UK.yml',
        dest: 'assets/json/en-UK.json',
        options:
          language: 'en_UK'

      fr:
        src: 'assets/yml/fr-FR.yml',
        dest: 'assets/json/fr-FR.json',
        options:
          language: 'fr_FR'

    jshint:
      app:
        options:
          boss: true
          expr: true
          eqnull: true
        files:
          src: ['assets/js/base.js',]

    concat:
      options:
        stripBanners: true
      dist:
        src: '<%= vendorlibs %>'
        dest: 'assets/js/app.js'

    uglify:
      app:
        options:
          sourceMap: 'assets/js/app.js.map'
        files:
          'assets/js/app.min.js': ['assets/js/app.js']

    imagemin:
      dist:
        options:
          optimizationLevel: 3
        files: [
            expand: true,
            cwd: 'assets/img/'
            src: '**/*.{png,jpg,jpeg}'
            dest: 'assets/img/'
        ]

    watch:
      options:
        atBegin: true
        interrupt: false
        spawn: false
      html:
        files: ['assets/templates/**/*.html']
        tasks: ['jst']
      coffee:
        files: ['assets/coffee/**/*.coffee']
        tasks: ['coffee']
      sass:
        files: ['assets/sass/**/*.sass']
        tasks: ['compass:app']
      scss:
        files: ['assets/scss/**/*.scss']
        tasks: ['compass:app']
      yml:
        files: ['assets/yml/*']
        tasks: ['i18next-yaml']


  # Default task.
  grunt.registerTask 'default', [
    'compass:app'
    'jst'
    'i18next-yaml'
    'coffee'
    'jshint'
  ]

  # deploy
  grunt.registerTask 'deploy', [
    'compass:deploy'
    'jst'
    'coffee'
    'concat'
    'uglify'
    'imagemin'
  ]
