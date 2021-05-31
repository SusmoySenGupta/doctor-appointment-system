import Api from "./ApiService";

export default {
    getPatients() {
        return Api().get("/api/admin/patients");
    },
};