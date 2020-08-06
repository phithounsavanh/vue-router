require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";

import App from "./views/App";
import Hello from "./views/Hello";
import Home from "./views/Home";
import UserIndex from "./views/UserIndex";
import UsersEdit from "./views/UsersEdit";
import NotFound from "./views/NotFound";
import UsersCreate from "./views/UsersCreate";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/Hello",
            name: "hello",
            component: Hello
        },
        {
            path: "/users",
            name: "users.index",
            component: UserIndex
        },
        {
            path: "/users/:id/edit",
            name: "users.edit",
            component: UsersEdit
        },
        {
            path: "/users/create",
            name: "users.create",
            component: UsersCreate
        },
        { path: "/404", name: "404", component: NotFound },
        { path: "*", redirect: "/404" }
    ]
});

const app = new Vue({
    el: "#app",
    components: { App },
    router
});
