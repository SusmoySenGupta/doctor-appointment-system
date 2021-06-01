import Api from "./ApiService";

export default {
    makeAdmin(id, data) {
        return Api().put("/api/admin/make-admin/" + id, data);
    }
};