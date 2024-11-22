"use strict"

const btnNewPost = document.querySelector(".newPost-formBox__btn");
const formBox = document.querySelector(".newPost-formBox");

btnNewPost.addEventListener("click", function(){
    formBox.classList.remove("newPost-formBox__disable");
    btnNewPost.classList.add("no-display");
})
console.log(formBox);