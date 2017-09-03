(function($) {
/**
 * 
 * Don't show mobile only share buttons
 */
var setupShareing = {

    isMobile : false,

    iosver : false,

    checkMobile : function(){
      setupShareing.isMobile = (navigator.userAgent.match(/iPad|iPhone|iPod|Android|android/g) ? true : false);
    },

    checkIos : function() {
      if (/iP(hone|od|ad)/.test(navigator.platform)) {
        var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
        setupShareing.iosver = [parseInt(v[1], 10), parseInt(v[2], 10), parseInt(v[3] || 0, 10)];
      }
    },
    
    checkButtonCount : function (){
      // Check if there is enough visible items to need share button
      var counter = 0;
      var sociallinks = $('#social-block a');
      sociallinks.each(function(index){
        if($(this).is(':visible')){
          counter++;
        }
      });
      // Check if we have some hidden links!
      if ( counter < sociallinks.length && (sociallinks.length - counter) <= 5){
        // 5 visible including the share button
        $("#openshare").hide();
      }
    },

    buttonsFixHref : function(){
        var cont = document.getElementById('share-buttons');
        if(cont === null ){
            return;
        }
        var links = cont.getElementsByTagName('a');
        var title = encodeURIComponent(document.title);
        var uri = encodeURIComponent( window.location.href);
        for(var i = 0; i < links.length; i++){
            var url = links[i].getAttribute('href');
            var newUrl = url.replace('%TITLE%', title).replace('%URI%', uri);
            links[i].setAttribute('href',newUrl);
        }
    },
    
    init : function() {
      setupShareing.checkMobile();
      setupShareing.checkIos();
      setupShareing.buttonsFixHref();
      if (!setupShareing.isMobile || (setupShareing.iosver !== false && setupShareing.iosver[0] < 6)) {
        var cont = document.getElementById('share-buttons');
        if(cont === null ){
            return;
        }
        var wapp = cont.getElementsByClassName('spritefont-whatsapp');
        if (wapp.length > 0) {
          for (var i = 0; i < wapp.length; i++){
            wapp[i].setAttribute("style", 'display:none');  
          }
        }
        var vibr = cont.getElementsByClassName('spritefont-whatsapp');
        if (vibr.length > 0) {
          for (var i = 0; i < vibr.length; i++){
            vibr[i].setAttribute("style", 'display:none');  
          }
        }
      }
      setupShareing.checkButtonCount();
    }
  };
  setupShareing.init();
/**
 * Added security on links to other sites, forcing noopener & noreferrer
 */
  var fixExternalLinks = {
    isExternalLink : function(linkElement){
      return (linkElement.host !== window.location.host);
    },
    init : function(){
      var mainarea = document.getElementsByTagName('main')[0];
      var links = mainarea.getElementsByTagName('a');
      for (var i = 0; i < links.length; i++) {
        if (fixExternalLinks.isExternalLink(links[i])) {          
          if(links[i].getAttribute("target")==="_blank") {            
            links[i].setAttribute("rel","noopener noreferrer");
          }
        }
      }
    }
  };
  fixExternalLinks.init();
  /**
   * 
   * @type type
   */
  var modal = {
    // Know if modal is open or closed
    open : false,
    // close modal window
    close : function(){
      if(modal.open === false){
        return;
      }
      var m = document.getElementById("modal");
      m.setAttribute("style", 'display:none');        
      this.open = false;
      m.parentNode.removeChild(m);
      $('body').off('.modal');
    },
    makeShareModal : function(){
      var html = '';
      this.create(html);
      $('#share-buttons a').clone().appendTo('#modal_container');
      $('#share-buttons a').removeClass('element-invisible');
    },
    // Create a modal window
    create : function(content){
      var html = "<div id='modal'><div id='modal_container'><a href='#closemodal' id='closemodal'>x</a>"+content+"</div></div>";
      $('body').append(html);
      this.open = true;
      $('body').on('click.modal', "#modal", function(e){
        modal.close();
      });
    },
    // Initialize the modal stuff
    init : function(){
      // Listen for click on open
      $('#social-block').on('click', '#openshare', function(e){
        e.preventDefault();
        modal.makeShareModal();
      });
      // Listen for mouse click on closebutton
      $('body').on('click', '#closemodal', function(e){
        e.preventDefault();
        modal.close();
      });
      // Listen for escape button 
      $(document).keyup(function(e) {
      if (e.keyCode === 27 && modal.open === true) {
        // only close modal if esc pressed and modal currently open
        modal.close();
        }
     });
    }
  };
  modal.init();
  /**
   * 
   */
  // Create share stuff in a window.
  var openShare = { 
    init : function(){
      $('body').on('click', '#share-buttons a', function(e){
        e.preventDefault();
        
        var href = $(this).attr("href");
        // open in window
        var wH = 530;
        var wW = 530;
        var winTop, winLeft;
        if( $( window ).width() > 800){
          // window open in space
          winTop = (screen.height / 2) - (wH / 2);
          winLeft = (screen.width / 2) - (wW / 2);
        } else {
          // open full screen
          winTop = (screen.height / 0.15) - (wH / 0.15);
          winLeft = (screen.width / 0.15) - (wW / 0.15);

        }
        window.open(href , 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + wW + ',height=' + wH);
        // close modal behind
        modal.close();
      });
     
    }
  };
  openShare.init();
  
  var resizer = {
      video : [
      'youtube','youtu.be','vimeo','youku'
    ],
    checkVideoProvider : function (link){
        for ( i = 0; i < this.video.length; i++){
            if(link.indexOf(this.video[i]) !== -1){
                return true;
            }
        }
        return false;
    },
    /**
     * performs re-size of videos in iframes only
     * @returns void
     */
      resizeVideo : function(){
        iframes = document.getElementsByTagName('iframe');
        if(iframes.length < 1){
            return;
        }
        for (i = 0; i < iframes.length; i++) {
            link = iframes[i].src;
            if(this.checkVideoProvider(link)){
                if($(iframes[i]).hasClass('featured')){
                    w = $( window ).width();
                }else{
                    w = $(iframes[i]).parent().width();
                }
                $(iframes[i]).width(w).height((w / 16 * 9 ));
            }
        }
        video = document.getElementsByTagName('video');
        for (i = 0; i < video.length; i++) {
            w = $(video[i]).parent().width();
            $(video[i]).width(w).height((w / 16 * 9 ));
        }
    },
    /**
     * performs re-size of all objects/embed
     * @returns void
     */
    resizeObjects : function(){
      objects = document.getElementsByTagName('object');
        if(objects.length < 1){
            return;
        }
        for (i = 0; i < objects.length; i++) {
            w = jQuery(objects[i]).parent().width();
            h = (w / 16 * 9 );
            $(objects[i]).width(w).height(h);
            $('embed:first', objects[i]).width(w).height(h);
        }
    },
    /**
     * resize event that runs with every resize event
     * @returns void
     */
    resizeEvent : function(){
        this.resizeVideo();
        this.resizeObjects();
    }
    
  };
  
   $(window).resize(function(){
      /**
       * run resizeEvent after a small timeout so it is not run as often
       */
      t = setTimeout(function(){resizer.resizeEvent();}, 300);
   });
   /**
    * run resizeEvent on load
    */
   resizer.resizeEvent();
  
  })(jQuery);