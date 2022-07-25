import http from "../http-common";

class CustomerDataService {
  getAll() {
    return http.get("/customer");
  }

  get(id) {
    return http.get(`/customer/${id}`);
  }

  create(data) {
    return http.post("/customer", data);
  }

  update(id, data) {
    return http.put(`/customer/${id}`, data);
  }

  delete(id) {
    return http.delete(`/customer/${id}`);
  }


  findByName(name) {
    return http.get(`/customer?name=${name}`);
  }

  uploadFile(file, onUploadProgress) {
    let formData = new FormData();
    formData.append('file', file);
    return http.post('/customer/upload', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      },
      onUploadProgress
    })
  }
}

export default new CustomerDataService();
