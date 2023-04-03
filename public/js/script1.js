window.onload = function(){
const dragArea = document.querySelector('.drag-area1');
const dragText = document.querySelector('.header1');

let button = document.querySelector('.button1');
let input = document.querySelector('.input1');


let file;


input.addEventListener('change', function() {
	file = this.files[0];
	//console.log(file);
	let fileType = file.type;
//console.log(fileType);
validExtension = ['image/jpeg' , 'image/jpg' , 'image/png'];
if(validExtension.includes(fileType	))
{
	let fileReader = new FileReader();

	fileReader.onload = () => {
		let fileURL = fileReader.result;
		//console.log(fileURL);
		let imgTag = '<img src="'+fileURL+'" alt="" >';
		dragArea.innerHTML = imgTag;

	};
	fileReader.readAsDataURL(file);
}
else
{
	input.value = '';
	alert('This file is not an Image');
	dragArea.classList.remove('active');
}

});



}

