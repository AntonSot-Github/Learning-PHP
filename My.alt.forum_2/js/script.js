"use strict"

const btnNewPost = document.querySelector(".newPost-formBox__btn");
const formBox = document.querySelector(".newPost-formBox");

btnNewPost.addEventListener("click", function(){
    formBox.classList.remove("newPost-formBox__disable");
    btnNewPost.classList.add("no-display");
})
//console.log(formBox);

let topics = document.querySelectorAll(".topic-menu__link");


function filterPosts(topicId) {
    let posts = document.querySelectorAll(".post");
    posts.forEach(post => {
        if (post.getAttribute("data-topic-id") === topicId) {
            post.style.display = "block"; // Показываем пост
        } else {
            post.style.display = "none"; // Скрываем пост
        }
    });
}


let firstTopic = topics[0];
let activeTopic = firstTopic; // Переменная для хранения текущей активной темы
activeTopic.classList.add("color-red");
let topicId = firstTopic.getAttribute("data-topic-id");

if(topicId){
    filterPosts(firstTopic.getAttribute("data-topic-id"));
}


topics.forEach(topic => {
    topic.addEventListener("click", (e) => {
        e.preventDefault(); // Отменяем переход по ссылке

        // Убираем цвет у предыдущей активной темы, если она есть
        if(activeTopic){
            activeTopic.classList.remove("color-red");
        }
        // Устанавливаем текущую тему как активную и меняем её цвет
        activeTopic = topic;
        topic.classList.add("color-red");

        topicId = topic.getAttribute("data-topic-id"); // Получаем ID темы
        filterPosts(topicId); // Фильтруем посты
    });
});

//Edit account
const accountEditBtn = document.querySelector(".account-link") || null;

if(accountEditBtn){
    const accWindow = document.querySelector(".account");
    const accWinCloseBtn = document.querySelector(".account__btn-close");
    const container = document.querySelector(".container");
    accountEditBtn.addEventListener("click", (e) => {
        e.preventDefault(); // Отменяем переход по ссылке
        accWindow.classList.remove("no-display");
        container.classList.add("no-display");
    })
    accWinCloseBtn.addEventListener("click", (e) => {
        e.preventDefault();
        accWindow.classList.add("no-display");
        container.classList.remove("no-display");
    })
}

//Edit account
// -- change avatar
const accAvaBtn = document.querySelector(".account__ava-link");
const accChangeAva = document.querySelector(".form-ava");
accAvaBtn.addEventListener("click", function(){
    accChangeAva.classList.toggle("no-display");
})

// --edit email
const accEmailBtn = document.getElementById("change-email");
const accountChangeEmail = document.querySelector(".account__changeEmail");
accEmailBtn.addEventListener("click", function(){
    accountChangeEmail.classList.toggle("no-display");
})
// --edit tel-number
const accTelBtn = document.querySelector(".changeTel");
const accChangeTel = document.querySelector(".account__changeTel");
accTelBtn.addEventListener("click", function(){
    accChangeTel.classList.toggle("no-display");
})
//--delete account
const delAccBtn = document.querySelector(".delAcc");
const delAccConfirm = document.querySelector(".account__deleteConf");
const delAccBtnNo = document.querySelector(".account__deleteAnswer--no");
delAccBtn.addEventListener("click", function(){
    delAccConfirm.classList.toggle("no-display");
})
delAccBtnNo.addEventListener("click", () => {
    delAccConfirm.classList.add("no-display");
})