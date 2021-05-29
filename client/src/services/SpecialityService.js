import Api from "./ApiService";

export default {
	getSpecialities() {
        return Api().get("/api/admin/specialities");
    },
    
    saveSpeciality(speciality) {
        return Api().post("/api/admin/specialities", speciality);
    },

    updateSpeciality(speciality) {
        return Api().put("/api/admin/specialities", speciality);
    }
};
