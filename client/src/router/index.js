import { createRouter, createWebHistory } from "vue-router";
import AuthRoutes from "./auth";
import AdminRoutes from "./admin";
import DoctorRoutes from "./doctor";
import PatientRoutes from "./patient";

const router = createRouter({
	history: createWebHistory(),
	routes: [
		...AuthRoutes,
		...AdminRoutes,
		...DoctorRoutes,
		...PatientRoutes,
		{
			path: "/:pathMatch(.*)*",
			name: "error.404",
			component: () => import("../views/error/404.vue"),
		},
	],
});

router.beforeEach((to, from, next) => {
	const USER = Store.getters.getCurrentUser;
	const IS_LOGGED_IN = USER ? true : false;

	if (to.meta.requiresAuth) {
		if (IS_LOGGED_IN && to.meta.checkRole === USER.role_id) {
			next();
		} else {
			next({ name: "auth.login" });
		}
	} else {
		if (
			IS_LOGGED_IN &&
			(to.name === "auth.login" || to.name === "auth.register")
		) {
			router.back();
		} else {
			next();
		}
	}
});

export default router;
