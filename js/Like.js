function Like() {
    var button = document.getElementById('like');
    var countElement = document.getElementById('likes');
    var count = parseInt(countElement.innerHTML);

    if (button.click) {
        count++;
    } else {
        count--;
    }

    countElement.innerHTML = count;
    button.click = !button.click; 
}
