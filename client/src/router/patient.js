const CHECK_ROLE = 3;

export default [
    {
        path: "/patient",
        component: () => import("../views/dashboard/main.vue"),
        children: [
            {
                path: "",
                name: "patient.home",
                component: () => import("../views/patient/home.vue"),
                meta: { requiresAuth: true, checkRole: CHECK_ROLE },
            },
        ],
    },
];