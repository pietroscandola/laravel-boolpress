<template>
  <div class="container">
    <Loader v-if="isLoading" />
    <h1>Contattaci</h1>
    <Alert
      v-if="hasError || alertMessage"
      :type="hasError ? 'danger' : 'success'"
      @on-close="closeAlert"
    >
      <div v-if="alertMessage">{{ alertMessage }}</div>
      <ul v-if="hasError">
        <li v-for="(value, key) in errors" :key="key">{{ value }}</li>
      </ul>
    </Alert>
    <div class="form-group">
      <label for="email">Email</label>
      <input
        type="email"
        class="form-control"
        :class="{ 'is-invalid': errors.email }"
        id="email"
        aria-describedby="emailHelp"
        v-model="form.email"
      />
      <div v-if="errors.email" class="invalid-feedback">
        {{ errors.email }}
      </div>
      <small v-else class="form-text text-muted">
        Ti ricontatteremo a questo indirizzo
      </small>
    </div>
    <div class="form-group">
      <label for="message">Testo del Messaggio</label>
      <textarea
        class="form-control"
        :class="{ 'is-invalid': errors.message }"
        id="message"
        rows="5"
        v-model="form.message"
      ></textarea>
      <div v-if="errors.message" class="invalid-feedback">
        {{ errors.message }}
      </div>
      <small v-else class="form-text text-muted">
        Scrivi il testo del tuo messaggio, ti risponderemo il più presto
        possibile
      </small>
    </div>
    <div class="d-flex justify-content-end">
      <button class="btn btn-success" @click="sendForm()">Invia</button>
    </div>
  </div>
</template>

<script>
import Loader from "../Loader.vue";
import Alert from "../Alert.vue";
export default {
  name: "ContactPage",
  components: { Alert, Loader },
  data() {
    return {
      form: {
        email: "",
        message: "",
      },
      alertMessage: null,
      isLoading: false,
      errors: {},
    };
  },
  computed: {
    hasError() {
      return Object.keys(this.errors).length; //mi dice vero o falso se ho errori oppure no
    },
  },
  methods: {
    validation() {
      // Validazione

      const errors = {};
      if (!this.form.email.trim()) errors.email = "Email Obbligatoria";
      if (!this.form.message.trim())
        errors.message = "Il testo del messaggio è obbligatorio";
      if (
        !this.form.email.match(
          /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
        )
      )
        errors.email = "Email non valida";

      this.errors = errors;
    },
    sendForm() {
      this.validation();
      if (!this.hasError) {
        const params = {
          email: this.form.email,
          message: this.form.message,
        };
        this.isLoading = true;
        axios
          .post("http://localhost:8000/api/messages", params)
          .then((res) => {
            if (res.data.errors) {
              const { email, message } = res.data.errors;
              const errors = {};
              if (email) errors.email = email[0];
              if (message) errors.message = message[0];
              this.errors = errors;
            } else {
              this.form.email = "";
              this.form.message = "";
              this.alertMessage = "Messaggio inviato con successo";
            }
          })
          .catch((err) => {
            console.error(err.response.status);
            this.errors = { error: "Si è verificato un errore" };
          })
          .then(() => {
            this.isLoading = false;
          });
      }
    },
    closeAlert() {
      this.alertMessage = null;
      this.errors = false;
    },
  },
};
</script>

<style>
</style>