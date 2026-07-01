<?php include 'header.php'; ?>
<style>
  :root{
    --bg:#fbfaf7;--ink:#100f0c;--ink-soft:rgba(16,15,12,0.75);
    --muted:rgba(16,15,12,0.55);--line:rgba(16,15,12,0.08);
    --orange:#ff5500;--maxw:1180px;
  }
  *{margin:0;padding:0;box-sizing:border-box}
  html{scroll-behavior:smooth}
  body{
    font-family:'Hanken Grotesk',-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
    line-height:1.6;color:var(--ink-soft);background:var(--bg);
    -webkit-font-smoothing:antialiased;display:flex;flex-direction:column;min-height:100vh;
  }
  .wrap{width:100%;max-width:var(--maxw);margin:0 auto;padding:0 24px}
  a{color:inherit;text-decoration:none}
  h1,h2{font-family:'Archivo',sans-serif;font-weight:800;letter-spacing:-.02em;color:var(--ink)}
  .mono{font-family:'JetBrains Mono',monospace}

  nav{border-bottom:1px solid var(--line);background:rgba(251,250,247,0.85);backdrop-filter:blur(12px);position:sticky;top:0;z-index:10}
  .nav-inner{display:flex;align-items:center;justify-content:space-between;height:68px}
  .brand{display:flex;align-items:center;gap:12px}
  .brand img{height:34px;width:auto;display:block}
  .brand-text{font-family:'Archivo';font-weight:900;font-size:20px;letter-spacing:-0.01em;color:var(--ink);line-height:1}
  .brand-text small{display:block;font-family:'JetBrains Mono';font-weight:600;font-size:8px;letter-spacing:.28em;color:var(--muted);margin-top:4px}
  .nav-back{font-size:14px;font-weight:600;color:var(--ink-soft);display:inline-flex;align-items:center;gap:6px}
  .nav-back:hover{color:var(--orange)}

  main{flex:1;display:flex;align-items:center}
  .careers{padding:96px 0;width:100%}
  .careers-inner{max-width:620px}
  .kicker{font-family:'JetBrains Mono';font-size:11px;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--muted)}
  .careers h1{font-size:clamp(34px,6vw,56px);line-height:1.05;margin:18px 0 22px}
  .careers h1 .o{color:var(--orange)}
  .lead{font-size:18px;color:var(--ink-soft);margin-bottom:14px}
  .sub{font-size:15px;color:var(--muted);margin-bottom:34px}

  .panel{
    border:1px solid var(--line);border-radius:16px;background:#fff;
    padding:28px 30px;margin-bottom:30px;
  }
  .panel-row{display:flex;align-items:center;gap:14px}
  .dot{width:10px;height:10px;border-radius:50%;background:#c9cdd2;flex:none}
  .panel h2{font-size:18px;margin-bottom:2px}
  .panel p{font-size:14px;color:var(--muted)}


</style>

<main>
  <section class="careers">
    <div class="wrap">
      <div class="careers-inner">
        <span class="kicker">Careers at CRMRS</span>
        <h1>We're not hiring <span class="o">right now</span>.</h1>

        <p class="lead">
          CRMRS is built by a small, focused team. We don't have any open roles at the moment.
        </p>

        <p class="sub">
          When we do start hiring, every opening will be posted right here on this page.
        </p>

        <div class="panel">
          <div class="panel-row">
            <span class="dot"></span>
            <div>
              <h2>No open positions</h2>
              <p>Check back later — we'll list roles here as soon as they open up.</p>
            </div>
          </div>
        </div>

        <p class="sub">
          Think you'd be a great fit anyway? We're always glad to hear from talented people.
          Send us a note and we'll keep you in mind — and let you know when something opens.
        </p>

        <a class="btn" href="mailto:team@crmrecoverysoftware.com?subject=Careers%20at%20CRMRS%20—%20notify%20me">
          Get notified when we hire →
        </a>
      </div>
    </div>
  </section>
</main>



<?php include 'footer.php'; ?>