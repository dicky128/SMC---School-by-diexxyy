<!-- Cinematic Lightbox HTML — tambahkan sebelum </body> -->
<div id="cinema-lb" style="
  position: fixed; inset: 0; z-index: 9999;
  background: rgba(8,8,10,0.97);
  opacity: 0; pointer-events: none;
  transition: opacity 0.5s cubic-bezier(0.22,1,0.36,1);
  display: flex; flex-direction: column;
">
  <!-- Top bar -->
  <div id="lb-topbar" style="
    position: absolute; top: 0; left: 0; right: 0; z-index: 10;
    padding: 1.5rem 2rem;
    display: flex; align-items: center; justify-content: space-between;
    background: linear-gradient(to bottom, rgba(8,8,10,0.8), transparent);
    transform: translateY(-20px); opacity: 0;
    transition: all 0.4s 0.2s cubic-bezier(0.22,1,0.36,1);
  ">
    <div style="font-family: 'Instrument Serif', serif; font-size: 1.1rem; color: rgba(255,255,255,0.5); letter-spacing: 0.12em; text-transform: uppercase; font-size: 0.7rem;">
      SD Muhammadiyah 01 Gentasari
    </div>
    <button id="lb-close" style="
      width: 44px; height: 44px;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 50%; cursor: pointer; color: rgba(255,255,255,0.7);
      font-size: 1.2rem; display: flex; align-items: center; justify-content: center;
      transition: all 0.2s; backdrop-filter: blur(8px);
    " aria-label="Tutup">✕</button>
  </div>

  <!-- Main image area -->
  <div id="lb-stage" style="
    flex: 1; display: flex; align-items: center; justify-content: center;
    padding: 5rem 6rem;
    position: relative;
  ">
    <img id="lb-img" src="" alt="" style="
      max-width: 100%; max-height: 70vh;
      object-fit: contain;
      border-radius: 8px;
      opacity: 0;
      transform: scale(0.94) translateY(16px);
      transition: all 0.5s 0.1s cubic-bezier(0.22,1,0.36,1);
    ">
    
    <!-- Nav arrows -->
    <button id="lb-prev" style="
      position: absolute; left: 1.5rem;
      width: 52px; height: 52px;
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 50%; cursor: pointer; color: rgba(255,255,255,0.6);
      font-size: 1.4rem; display: flex; align-items: center; justify-content: center;
      transition: all 0.2s; backdrop-filter: blur(8px);
    ">‹</button>
    <button id="lb-next" style="
      position: absolute; right: 1.5rem;
      width: 52px; height: 52px;
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 50%; cursor: pointer; color: rgba(255,255,255,0.6);
      font-size: 1.4rem; display: flex; align-items: center; justify-content: center;
      transition: all 0.2s; backdrop-filter: blur(8px);
    ">›</button>
  </div>

  <!-- Bottom info + thumbnails -->
  <div id="lb-bottom" style="
    padding: 1.5rem 2rem 2rem;
    background: linear-gradient(to top, rgba(8,8,10,0.9), transparent);
    transform: translateY(20px); opacity: 0;
    transition: all 0.4s 0.25s cubic-bezier(0.22,1,0.36,1);
  ">
    <!-- Caption -->
    <div style="text-align: center; margin-bottom: 1.25rem;">
      <div id="lb-title" style="
        font-family: 'Instrument Serif', serif;
        font-size: clamp(1.4rem, 4vw, 2.2rem);
        color: rgba(255,255,255,0.92);
        letter-spacing: -0.01em;
        line-height: 1.1;
        margin-bottom: 0.4rem;
      "></div>
      <div id="lb-counter" style="
        font-size: 0.72rem; 
        color: rgba(255,255,255,0.3); 
        letter-spacing: 0.2em; 
        text-transform: uppercase;
      "></div>
    </div>
    
    <!-- Thumbnail strip -->
    <div id="lb-thumbs" style="
      display: flex; gap: 8px; justify-content: center;
      overflow-x: auto; padding: 4px 0;
    "></div>
  </div>
</div>

<script>
(function() {
  const lb = document.getElementById('cinema-lb');
  const lbImg = document.getElementById('lb-img');
  const lbTitle = document.getElementById('lb-title');
  const lbCounter = document.getElementById('lb-counter');
  const lbThumbs = document.getElementById('lb-thumbs');
  const lbTopbar = document.getElementById('lb-topbar');
  const lbBottom = document.getElementById('lb-bottom');
  
  let images = [], currentIdx = 0;
  
  // Kumpulkan semua gambar galeri
  function initGallery() {
    images = [...document.querySelectorAll('[data-gallery]')].map(el => ({
      src: el.dataset.src || el.src || el.href,
      title: el.dataset.title || el.alt || '',
    }));
    
    // Build thumbnails
    lbThumbs.innerHTML = images.map((img, i) => `
      <div data-lb-thumb="${i}" style="
        width: 54px; height: 40px; border-radius: 6px; overflow: hidden;
        cursor: pointer; flex-shrink: 0;
        opacity: 0.4; transition: all 0.2s;
        border: 1.5px solid transparent;
      ">
        <img src="${img.src}" style="width:100%;height:100%;object-fit:cover;">
      </div>
    `).join('');
    
    lbThumbs.querySelectorAll('[data-lb-thumb]').forEach(thumb => {
      thumb.addEventListener('click', () => showImage(parseInt(thumb.dataset.lbThumb)));
    });
  }
  
  function showImage(idx) {
    currentIdx = idx;
    const img = images[idx];
    
    // Transition out
    lbImg.style.opacity = '0';
    lbImg.style.transform = 'scale(0.96) translateY(8px)';
    
    setTimeout(() => {
      lbImg.src = img.src;
      lbTitle.textContent = img.title;
      lbCounter.textContent = `${idx + 1} / ${images.length}`;
      
      // Update active thumb
      lbThumbs.querySelectorAll('[data-lb-thumb]').forEach((t, i) => {
        t.style.opacity = i === idx ? '1' : '0.35';
        t.style.borderColor = i === idx ? 'rgba(255,255,255,0.6)' : 'transparent';
        t.style.transform = i === idx ? 'scale(1.05)' : 'scale(1)';
      });
      
      lbImg.onload = () => {
        lbImg.style.opacity = '1';
        lbImg.style.transform = 'scale(1) translateY(0)';
      };
    }, 120);
  }
  
  function open(idx) {
    initGallery();
    lb.style.opacity = '1';
    lb.style.pointerEvents = 'auto';
    lbTopbar.style.opacity = '1';
    lbTopbar.style.transform = 'translateY(0)';
    lbBottom.style.opacity = '1';
    lbBottom.style.transform = 'translateY(0)';
    document.body.style.overflow = 'hidden';
    showImage(idx);
  }
  
  function close() {
    lb.style.opacity = '0';
    lb.style.pointerEvents = 'none';
    lbImg.style.opacity = '0';
    lbTopbar.style.opacity = '0';
    lbTopbar.style.transform = 'translateY(-20px)';
    lbBottom.style.opacity = '0';
    lbBottom.style.transform = 'translateY(20px)';
    document.body.style.overflow = '';
  }
  
  // Event listeners
  document.getElementById('lb-close').addEventListener('click', close);
  document.getElementById('lb-prev').addEventListener('click', () => 
    showImage((currentIdx - 1 + images.length) % images.length));
  document.getElementById('lb-next').addEventListener('click', () => 
    showImage((currentIdx + 1) % images.length));
  
  lb.addEventListener('click', e => { if (e.target === lb) close(); });
  document.addEventListener('keydown', e => {
    if (lb.style.opacity === '1') {
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowLeft') showImage((currentIdx - 1 + images.length) % images.length);
      if (e.key === 'ArrowRight') showImage((currentIdx + 1) % images.length);
    }
  });
  
  // Auto-attach ke semua gallery trigger
  document.addEventListener('click', e => {
    const trigger = e.target.closest('[data-gallery]');
    if (trigger) {
      e.preventDefault();
      initGallery();
      const idx = [...document.querySelectorAll('[data-gallery]')].indexOf(trigger);
      open(Math.max(0, idx));
    }
  });
  
  window.openGallery = open;
})();
</script>