
/*
    a função do modal explicada:

    -> Primeiro coletamos a informação do modal e guardamos em uma variavel
    -> Depois, nós adicionamos a class 'show' na class do modal para que ele apareça
    -> Para aparecer e sumir, temos que coletar a informação de onde clicamos, com o (e.target)
    que coleta o target do click (visivel no console)
    -> Por ultimo, criamos dois ifs. Um para verificar o nome da class e o nome do Id, se for true, vai fechar o modal, se não, fica aberto. E outro para não dar erro caso o modal não exista.


*/

// Modal ===================================================//

function startModal(modalID) {
    const modal = document.getElementById(modalID)
        if (modal) {
        modal.classList.add('show')
        modal.addEventListener('click', (e) => {
            if (e.target.id === modalID || e.target.className === 'close') {
                modal.classList.remove('show')
            }
        })
    }

}

const btnLogin = document.getElementById('login')
btnLogin.addEventListener('click', () => startModal('modal-login'))


const btnMobile = document.getElementById('btn-mobile')

function toggleMenu() {
    const nav = document.getElementById('navbar')
    const btnActive = document.getElementById('btn-mobile')
    nav.classList.toggle('active')
    btnActive.classList.toggle('active')
}

btnMobile.addEventListener('click', toggleMenu)

// Validadores

function maskJs(value, pattern) {
    let i = 0;
    let v = value.toString();
    v = v.replace(/\D/g, '');
    return pattern.replace(/#/g, () => v[i++] || '');
};

function aplicar(value) {
    const formatado= maskJs(value, '###.###.###-##');
    document.getElementById('cpf').value = formatado;
}