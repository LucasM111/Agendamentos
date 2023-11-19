var menuItem = document.querySelectorAll(".selecionar")

function selectLink(){
    menuItem.forEach((item)=>
        item.classList.remove('ativo')
    )
    this.classList.add('ativo')
}

menuItem.forEach((item) => {
    item.addEventListener('click', selectLink);

    // Verifica se o link corresponde à página atual e adiciona 'ativo' se necessário
    var currentPage = window.location.href;
    var link = item.querySelector('a').getAttribute('href');
    if (currentPage.includes(link)) {
        item.classList.add('ativo');
    }
});
