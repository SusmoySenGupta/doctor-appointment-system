import Api from "./ApiService";

export default {
    getPatients() {
        return Api().get("admin/get-patients");
    },
};