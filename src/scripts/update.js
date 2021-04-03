let updateButtons = document.getElementsByClassName("update-input__button");


for (let i = 0; i<updateButtons.length; i++){
  updateButtons[i].addEventListener('click', editable);
}

function editable(){
  let sectionUpdate = document.getElementsByClassName('update-input');
  for (let i = 0; i<sectionUpdate.length; i++){
    sectionUpdate[i].childNodes[1].disabled = false;
    updateButtons[i].hidden = true;
  }
}