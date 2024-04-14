function changeImage() {
    var image = document.getElementById("myImage");

    if (image.src.match("bulbon")) {
      image.src = "http://127.0.0.1:8000/images/heart (1).png";
    } else {
      image.src = "http://127.0.0.1:8000/images/heart (1).png";
    }
  }
