<template>
  <q-page
    :class="loading ? 'loading-background' : 'loaded-background'"
    class="card-game q-pa-none"
  >
    <div v-show="loading" class="centered-text">
      <p class="text-h3" style="font-size: 90px">CARD GAME</p>
    </div>

    <div v-show="!loading">
      <div class="card-game" style="margin: 50px">
        <q-btn
          rounded
          flat
          class="button-header"
          :class="{
            'active-button': activeButton === 'couple-card',
            'inactive-button': activeButton !== 'couple-card',
          }"
          @click="setActive('couple-card')"
        >
          Couple Card
        </q-btn>
        <q-btn
          rounded
          flat
          class="button-header"
          :class="{
            'active-button': activeButton === 'tarot',
            'inactive-button': activeButton !== 'tarot',
          }"
          @click="setActive('tarot')"
        >
          Tarot
        </q-btn>
        <q-btn
          rounded
          flat
          class="button-header"
          :class="{
            'active-button': activeButton === 'truth-or-dare',
            'inactive-button': activeButton !== 'truth-or-dare',
          }"
          @click="setActive('truth-or-dare')"
        >
          Truth or Dare
        </q-btn>
      </div>

      <div class="card-center">
        <q-card
          flat
          class="text-center"
          style="
            background-color: #fde9cf;
            width: 554px;
            height: 323px;
            border-radius: 24px;
          "
        >
          <p
            style="
              font-size: 31px;
              margin: 0px;
              color: #b2afff;
              padding: 50px;
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100%;
              font-family: 'Fredoka One', sans-serif;
            "
          >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  name: "CardGame",
  data() {
    return {
      activeButton: "",
      loading: true,
    };
  },
  mounted() {
    // Menghilangkan loading screen setelah 3 detik
    setTimeout(() => {
      this.loading = false;
    }, 2500);
  },
  methods: {
    setActive(button) {
      this.activeButton = button; // Set tombol yang aktif
    },
  },
};
</script>

<style scoped>
/* .card-game {
  background-image: url(src/assets/card-game-1.png);
} */

.loading-background {
  background-image: url(src/assets/loading-card.png); /* Gambar untuk loading */
  background-size: cover; /* Mengatur agar gambar menutupi seluruh halaman */
  background-position: center;
}

.loaded-background {
  background-image: url(src/assets/card-game-1.png); /* Gambar setelah loading selesai */
  background-size: cover; /* Mengatur agar gambar menutupi seluruh halaman */
  background-position: center;
}


.active-button {
  background-color: #fde9cf;
  color: #b2afff;
}

.button-header {
  /* margin: 40px 20px; */
  margin-right: 30px;
  height: 50px;
  width: 120px;
  border-color: black;
}
.centered-text {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  font-size: 240px;
  font-family: "Fredoka One", sans-serif;
  color: #b2afff;
}

.inactive-button {
  border: 1px solid black;
  color: black;
}

.card-center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 70vh;
}

.q-btn {
  text-transform: none;
}
</style>
