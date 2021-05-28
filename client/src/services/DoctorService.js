import Api from "./ApiService";

export default {
	getDoctors() {
        return Api().get("/api/admin/doctors");
	},
};
