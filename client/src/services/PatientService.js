import Api from "./ApiService";

export default {
    getPatients() {
        return Api().get("admin/get-patients");
    },

    updatePatient(id, data) {
        return Api().put("patient/update/" + id, data);
    }
};