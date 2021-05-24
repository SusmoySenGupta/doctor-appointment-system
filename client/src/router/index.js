import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
	history: createWebHistory(),
	routes: [
		{
			path: "/login",
			name: "auth.login",
			component: () => import("../views/auth/login.vue"),
		},
		{
			path: "/register",
			name: "auth.register",
			component: () => import("../views/auth/register.vue"),
		},
		{
			path: "/",
			redirect: { name: "dashboard.home" },
		},
		{
			path: "/dashboard",
			component: () => import("../views/dashboard/main.vue"),
			children: [
				{
					path: "/",
					redirect: { name: "dashboard.home" },
					meta: { requiresAuth: true },
				},
				{
					path: "home",
					name: "dashboard.home",
					component: () => import("../views/home.vue"),
					meta: { requiresAuth: true },
				},
			],
		},
	],
});

router.beforeEach((to, from, next) => {
	if (to.meta.requiresAuth) {
		const isLoggedIn = Store.getters.getCurrentUser ? true : false;

		if (isLoggedIn) {
			next();
		} else {
			next({ name: "auth.login" });
		}
	} else next();
});

export default router;
