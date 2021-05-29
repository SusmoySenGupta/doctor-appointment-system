import Api from "./ApiService";

export default {
    getSpecialities() {
        return Api().get("/api/admin/specialities");
    },

    saveSpeciality(speciality) {
        return Api().post("/api/admin/specialities", speciality);
    },

    updateSpeciality(id, speciality) {
        return Api().put("/api/admin/specialities/" + id, speciality);
    }
};