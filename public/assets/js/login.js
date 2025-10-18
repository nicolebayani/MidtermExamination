document.addEventListener('DOMContentLoaded', function(){
  // simple fade-in for card elements
  const card = document.querySelector('.card');
  if(card){
    card.style.opacity = 0;
    card.style.transform = 'translateY(8px)';
    setTimeout(()=>{card.style.transition='all 480ms cubic-bezier(.2,.9,.3,1)';card.style.opacity=1;card.style.transform='translateY(0)';},80);
  }

  // show loading state on submit
  const form = document.querySelector('form');
  if(form){
    form.addEventListener('submit', function(){
      const btn = form.querySelector('button[type="submit"]');
      if(btn){
        btn.disabled = true;
        btn.dataset.original = btn.innerHTML;
        btn.innerHTML = 'Signing in…';
      }
    });
  }
});
