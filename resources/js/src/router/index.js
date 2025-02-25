import { createMemoryHistory, createRouter, createWebHistory } from "vue-router";
const routes = [
    {
        path: "/login",
        name: "login",
        component: () => import("../pages/auth/LoginPage.vue"),
    },
    {
        path: "/signup",
        name: "signup",
        component: () => import("../pages/auth/SignUpPage.vue"),
    }
];

export const router = createRouter({
    //history: createMemoryHistory(),
    history:createWebHistory('/app'),
    routes,
})
