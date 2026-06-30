<footer>
  <div class="wrap">
    <div class="foot">
      <div>
        <div class="foot-brand">
          <img src="assets/images/logo.webp" alt="CRMRS logo">
          <span class="brand-text">CRMRS<small>RECOVERY SOFTWARE</small></span>
        </div>
        <p>Multi-tenant loan recovery software. Built in India for agencies that take field accountability and compliance seriously.</p>
      </div>
      <div class="fcol">
        <h4>Product</h4>
        <a href="#features">Features</a>
        <a href="#security">Security</a>
        <a href="#apps">Apps</a>
        <a href="#how">How it works</a>
      </div>
      <div class="fcol">
        <h4>Agency</h4>
        <a href="https://agency.crmrecoverysoftware.com">Agency portal</a>
        <a href="https://agency.crmrecoverysoftware.com/register.html">Apply now</a>
        <a href="https://apps.microsoft.com/detail/9P4R6Q1VQ523?hl=en-us&amp;gl=IN" target="_blank" rel="noopener">Windows app (Microsoft Store)</a>
      </div>
      <div class="fcol">
        <h4>Company</h4>
        <a href="http://localhost/crmrs-mainsite/careers.php">Careers</a>
        <a href="privacy-policy.html">Privacy policy</a>
      </div>
      <div class="fcol">
        <h4>Contact</h4>
        <a href="tel:+916377362603">+91 63773 62603</a>
        <a href="mailto:team@crmrecoverysoftware.com">team@crmrecoverysoftware.com</a>
        <a href="mailto:rahul@loopwar.dev">rahul@loopwar.dev</a>
      </div>
    </div>
    <div class="foot-bottom">
      <div>&copy; 2026 CRMRS — Recovery Software. All rights reserved.</div>
      <div class="mono">crmrecoverysoftware.com</div>
    </div>
  </div>
</footer>

<a href="#top-anchor" class="top" id="top" aria-label="Back to top">↑</a>

<script>
  var nav=document.getElementById('nav'),top=document.getElementById('top');
  window.addEventListener('scroll',function(){
    var y=window.scrollY;
    nav.classList.toggle('scrolled',y>10);
    top.classList.toggle('show',y>620);
  },{passive:true});
  var io=new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } });
  },{threshold:.12});
  document.querySelectorAll('.reveal').forEach(function(el){io.observe(el)});

  document.querySelectorAll('[data-swiper]').forEach(function(sw){
    var track=sw.querySelector('.swiper-track');
    var prev=sw.querySelector('.sprev'), next=sw.querySelector('.snext');
    var thumb=sw.querySelector('.swiper-prog i');
    function step(){
      var c=track.querySelector('.card');
      var gap=parseInt(getComputedStyle(track).columnGap)||22;
      return c?Math.round(c.getBoundingClientRect().width+gap):320;
    }
    function update(){
      var max=track.scrollWidth-track.clientWidth, x=track.scrollLeft;
      var vis=track.clientWidth/track.scrollWidth, frac=max>0?x/max:0;
      if(thumb){ thumb.style.width=(vis*100)+'%'; thumb.style.transform='translateX('+(frac*((1/vis)-1)*100)+'%)'; }
      if(prev) prev.disabled = x<=2;
      if(next) next.disabled = x>=max-2;
    }
    if(prev) prev.addEventListener('click',function(){track.scrollBy({left:-step(),behavior:'smooth'});});
    if(next) next.addEventListener('click',function(){track.scrollBy({left:step(),behavior:'smooth'});});
    var down=false,sx=0,sl=0,moved=false;
    track.addEventListener('pointerdown',function(e){down=true;moved=false;sx=e.clientX;sl=track.scrollLeft;track.classList.add('drag');});
    track.addEventListener('pointermove',function(e){if(!down)return;var dx=e.clientX-sx;if(Math.abs(dx)>4)moved=true;track.scrollLeft=sl-dx;});
    function end(){ if(down){down=false;track.classList.remove('drag');} }
    track.addEventListener('pointerup',end);
    track.addEventListener('pointerleave',end);
    track.addEventListener('pointercancel',end);
    track.addEventListener('click',function(e){ if(moved){e.preventDefault();e.stopPropagation();} },true);
    track.addEventListener('scroll',update,{passive:true});
    window.addEventListener('resize',update);
    update();
  });
</script>

<!-- <script src="assets/js/script.js"></script> -->
</body></html>