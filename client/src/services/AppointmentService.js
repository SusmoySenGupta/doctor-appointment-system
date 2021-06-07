import Api from "./ApiService";

export default {
    getAppointments() {
        return Api().get("/api/appointments");
    },

    markAsChecked(id) {
        return Api().put("/api/doctor/appointments/" + id);
    },

    saveFeedback(id, data) {
        return Api().put("/api/patient/appointments/feedback/" + id, data);
    }

};