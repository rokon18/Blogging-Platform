function addTag() {
  let input = document.getElementById('tagInput');
  let tag = input.value.trim();
  if (tag) {
    let tagContainer = document.getElementById('tagContainer');
    let span = document.createElement('span');
    span.textContent = `#${tag}`;
    span.onclick = function() {
      tagContainer.removeChild(span);
    };
    tagContainer.appendChild(span);
    input.value = '';
  }
}