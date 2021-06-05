import Api from "./ApiService";

export default {
    getDoctors() {
        return Api().get("/api/admin/doctors");
    },

    saveDoctor(data) {
        return Api().post("/api/admin/doctors", data);
    },

    updateGap(data) {
        return Api().put("/api/doctor/gap/update", data);
    }
};