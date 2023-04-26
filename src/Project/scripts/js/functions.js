function getSize() {
    const selectedSize = document.querySelector('input[name="option"]:checked').value;
    console.log(selectedSize);
    setSize(selectedSize);
  }
function setSize(selectedSize){
  document.getElementById('size').value = selectedSize;
}
function checkSize(event){
//     event.preventDefault();
//     const toastMsg = document.getElementById('toastText');
//   if(document.getElementById('size').value == ""){
//     toastMsg.textContent = "Please choose a size!";
//     toastMsg.classList.remove('text-success');
//     toastMsg.classList.add('text-danger');
//     const toastTrigger = document.getElementById('toastBtn')
//     const toastAlert = document.getElementById('toast')

//     if (toastTrigger) {
//         const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastAlert)
//         toastTrigger.addEventListener('click', () => {
//             toastBootstrap.show()
//         })
//     }
//   }else{
//     toastMsg.textContent = "Added to cart!";
//     toastMsg.classList.add('text-success');
//     toastMsg.classList.remove('text-danger');
//     event.target.submit();
//   }
}
function passwordChange(){
    document.getElementById('myProfileForm').style.display = 'none';
    document.getElementById('myProfileFormChangePass').style.display = 'flex';
    document.getElementById('changePassBtn').style.display = 'none';
    document.getElementById('goBackBtn').style.display = 'flex';
  
  }
  
  function cancelPasswordChange(){
    document.getElementById('myProfileForm').style.display = 'flex';
    document.getElementById('myProfileFormChangePass').style.display = 'none';
    document.getElementById('changePassBtn').style.display = 'flex';
    document.getElementById('goBackBtn').style.display = 'none';
  }