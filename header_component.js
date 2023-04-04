Vue.component('header_component', {
    props: ['name_user', 'nav_ref', 'login_user'],
    template:
        `<header>
        <h1>Online-shop</h1>
        <h1>Hello, {{name_user}}</h1>
        <h2>Login: {{login_user}}</h2>
        <nav>
        <li v-for='item in nav_ref'>
            <a :href='[item.ref]'>
            {{item.name}}
            </a>
        </li>
        </nav>
    </header>`
});

// если <a :href='[item.ref]'> не работает, меняем [item.ref] на {{item.ref}}