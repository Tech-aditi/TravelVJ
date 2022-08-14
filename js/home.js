const showModal = (openButton, modalContent) =>{
    const openBtn = document.getElementById(openButton),
    modalContainer = document.getElementById(modalContent)
    
    if(openBtn && modalContainer){
        openBtn.addEventListener('click', ()=>{
            modalContainer.classList.add('show-modal')
        })
    }
  }
  showModal('open-modal','modal-container')
  
  
  const closeBtn = document.querySelectorAll('.close-modal')
  
  function closeModal(){
    const modalContainer = document.getElementById('modal-container')
    modalContainer.classList.remove('show-modal')
  }
  closeBtn.forEach(c => c.addEventListener('click', closeModal))
  var modals = document.getElementsByClassName("modal");
  var modalOpenBtn = document.getElementsByClassName("modalOpenBtn");
  var currentModal = null;
  
  // Function to open modal by id
  function openModal(id) {
  for (i = 0; i < modals.length; i++) {
    if (modals[i].getAttribute('id') == id) {
      currentModal = modals[i];
      currentModal.style.display = "block";
      break;
    }
  }
  }
  
  // When the user clicks the button, open modal with the same id
  modalOpenBtn.onclick = function() {
  let currentID = modalOpenBtn.getAttribute('id');
  openModal(currentID);
  }
  
  // When the user clicks anywhere outside of the modal or the X, close
  window.onclick = function(event) {
  if (event.target == currentModal || event.target.getAttribute('class') == 'modalClose') {
    currentModal.style.display = "none";
  }
  }



  const chk = document.getElementById('chk');

chk.addEventListener('change', () => {
document.body.classList.toggle('dark');
});

var videos = document.querySelectorAll('video');
for(var i=0; i<videos.length; i++)
   videos[i].addEventListener('play', function(){pauseAll(this)}, true);


function pauseAll(elem){
	for(var i=0; i<videos.length; i++){
		//Is this the one we want to play?
		if(videos[i] == elem) continue;
		//Have we already played it && is it already paused?
		if(videos[i].played.length > 0 && !videos[i].paused){
		// Then pause it now
		  videos[i].pause();
		}
	}
  }
  

  