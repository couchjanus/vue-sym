// assets/js/services/http.js

class HttpService {

  getAll(url) {
    return axios.get(url);
  }

  get(url, id) {
    return axios.get(`${url}/${id}`);
  }
}

export default new HttpService();