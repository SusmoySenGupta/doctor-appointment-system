import Api from "./ApiService";

export default {
	register(data) {
        return Api().post("/api/register", data);
	},
};
