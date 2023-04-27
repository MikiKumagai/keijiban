
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