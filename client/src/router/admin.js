const CHECK_ROLE = 1;

export default [
	{
		path: "/admin",
		component: () => import("../views/dashboard/main.vue"),
		children: [
			{
				path: "",
				name: "admin.home",
				component: () => import("../views/admin/home.vue"),
				meta: { requiresAuth: true, checkRole: CHECK_ROLE },
			},
			{
				path: "profile",
				name: "admin.profile",
				component: () => import("../views/admin/profile.vue"),
				meta: { requiresAuth: true, checkRole: CHECK_ROLE },
			},
		],
	},
];
