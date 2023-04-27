// replys = document.querySelectorAll(`[id^='reply']`); //AllでEachに対応
// length3 = document.querySelectorAll(`[class^='length']`); 
// replys.forEach((element, index) => // 繰り返し
// element.addEventListener('input', () => { //element=forEachの要素
//   length3[index].textContent = maxLength - element.value.length; //index=
//     if (maxLength - element.value.length < 0) {
//       length3[index].style.color = 'red';
//     } else {
//       length3[index].style.color = '#444';
//     };
//   }, false)
// );

function input(id) {
  div = document.getElementById(id);
  textArea2 = div.children[0];
  length2 = div.children[1].children[0];
  length2.textContent = maxLength - textArea2.value.length;
  if (maxLength - textArea2.value.length < 0) {
    length2.style.color = 'red';
  } else {
    length2.style.color = '#444';
  }
}