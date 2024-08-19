<template>
  <q-page class="landing-page">
    <div ref="lottieAnimation" class="lottie-bg"></div>
    <section id="home" class="home-section">
      <div class="col-center text-center">
        <h3 style="margin: 0%; color: white">ADSY GROUP</h3>
        <h5 style="margin: 0%; color: white">Make your ideas to life</h5>

        <q-btn
          rounded
          outline
          color="white"
          style="margin-top: 25px"
          @click="scrollDown"
          >See Project
          <q-icon name="arrow_downward"></q-icon>
        </q-btn>
      </div>
    </section>

    <section id="project" class="project-section">
      <div class="column">
        <p class="text-h4 text-bold" style="color: white;" >PROJECTS</p>
        <div class="row">
          <q-card class="my-card" flat bordered @click="$router.push('/card-game') " >
            <img src="/src/assets/unsplash_FW589opoYjg.png" />

            <q-card-actions style="justify-content: space-between">
              <p class="text-bold" style="margin: 7px 5px">CARD GAME</p>
              <q-btn flat rounded class="text-caption" style="margin: 7px 5px"
                >short description</q-btn
              >
            </q-card-actions>
          </q-card>
          <q-card class="my-card" flat bordered>
            <img src="/src/assets/unsplash_FW589opoYjg.png" />

            <q-card-actions style="justify-content: space-between">
              <p class="text-bold" style="margin: 7px 5px">CARD GAME</p>
              <q-btn flat rounded class="text-caption" style="margin: 7px 5px"
                >short description</q-btn
              >
            </q-card-actions>
          </q-card>
          <q-card class="my-card" flat bordered>
            <img src="/src/assets/unsplash_FW589opoYjg.png" />

            <q-card-actions style="justify-content: space-between">
              <p class="text-bold" style="margin: 7px 5px">CARD GAME</p>
              <q-btn flat rounded class="text-caption" style="margin: 7px 5px"
                >short description</q-btn
              >
            </q-card-actions>
          </q-card>
        </div>
      </div>
    </section>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";
import lottie from "lottie-web";
import waveAnimation from "../assets/animationLandingPage.json";
import { route } from "quasar/wrappers";
import router from "src/router";

export default defineComponent({
  name: "LandingPage",
  mounted() {
    this.initLottie();
  },
  methods: {
    scrollDown() {
      const projectSection = document.getElementById("project");
      projectSection.scrollIntoView({ behavior: "smooth" });
    },
    initLottie() {
      lottie.loadAnimation({
        container: this.$refs.lottieAnimation, // Elemen DOM di mana animasi akan dimuat
        renderer: "svg",
        loop: true,
        autoplay: true,
        animationData: waveAnimation, // Data animasi JSON
      });
    },
  },
});
</script>

<style>
.q-btn {
  text-transform: none;
}
.my-card {
  width: 100%;
  max-width: 300px;
  border-radius: 24px;
}

.landing-page {
  position: relative;
  overflow: hidden;
  /* display: flex;
  flex-direction: column; */
}

.home-section {
  height: 100vh; /* Menjadikan masing-masing bagian sebesar 1 layar penuh */
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: linear-gradient(to bottom, #000000, #365c45);
  position: relative; /* Ensure sections are positioned above the background */
}

.project-section {
  height: 100vh; /* Menjadikan masing-masing bagian sebesar 1 layar penuh */
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background-color: #365c45;
  position: relative; /* Ensure sections are positioned above the background */
}

.lottie-bg {
  position: absolute;
  align-content: center;
  top: 0;
  left: 0%;
  width: 50%;
  height: 50%;
  z-index: 1;
  color: #a6c292;
}

.row {
  display: flex;
  justify-content: space-between;
  gap: 20px; /* Jarak antar kartu dalam baris */
}

/* .lottie-bg {
  filter: hue-rotate(90deg);
} */
</style>
