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
      <div>
        <div v-if="isMobile" class="card-slider">
          <p class="text-h4 text-bold" style="color: white">PROJECTS</p>

          <q-carousel
            arrows
            swipeable
            animated
            infinite
            :autoplay="true"
            style="border-radius: 15px; overflow: hidden"
            v-model="slide"
            transition-prev="slide-right"
            transition-next="slide-left"
            height="450px"
          >
            <q-carousel-slide
              v-for="project in projects"
              :key="project.id"
              :name="project.id"
              class="carousel-slide"
              style="
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                padding: 0px;
                margin: 0px;
              "
            >
              <q-card
                class="mobile-card"
                flat
                bordered
                @click="$router.push(project.link)"
              >
                <q-img
                  :src="project.image_url"
                  style="width: 100%; height: 300px; object-fit: cover"
                />
                <q-card-actions class="q-pa-md">
                  <p
                    style="margin: 20px 5px; font-size: 30px"
                    class="text-bold"
                  >
                    {{ project.title }}
                  </p>
                  <p
                    style="margin: 0%; font-size: 20px"
                    flat
                    rounded
                    class="text-caption"
                  >
                    {{ project.description }}
                  </p>
                </q-card-actions>
              </q-card>
            </q-carousel-slide>
          </q-carousel>
        </div>
      </div>

      <div v-if="!isMobile" class="column">
        <p class="text-h4 text-bold" style="color: white">PROJECTS</p>
        <div class="row">
          <q-card
            v-for="project in projects"
            :key="project.id"
            class="mobile-card"
            style="width: 400px; height: auto; border-radius: 24px"
            flat
            bordered
            @click="$router.push(project.link)"
          >
            <img
              :src="project.image_url"
              style="width: 100%; height: 150px; object-fit: cover"
            />

            <q-card-actions style="justify-content: space-between">
              <p class="text-bold" style="margin: 7px 5px">
                {{ project.title }}
              </p>
              <p style="margin: 7px 5px" flat rounded class="text-caption">
                {{ project.description }}
              </p>
            </q-card-actions>
          </q-card>
        </div>
      </div>
    </section>
  </q-page>
</template>

<script>
import { defineComponent, ref } from "vue";
import lottie from "lottie-web";
import waveAnimation from "../assets/animationLandingPage.json";
import { route } from "quasar/wrappers";
import router from "src/router";

export default defineComponent({
  name: "LandingPage",
  mounted() {
    this.initLottie();
    window.addEventListener("resize", this.checkIsMobile);
  },

  beforeUnmount() {
    window.removeEventListener("resize", this.checkIsMobile);
  },
  data() {
    return {
      slide: ref(1),
      autoplay: true,
      isMobile: false,
      projects: [
        {
          id: 1,
          title: "CARD GAME",
          description: "short description",
          image_url: "/src/assets/unsplash_FW589opoYjg.png",
          link: "/card-game",
        },
        {
          id: 2,
          title: "PROJECT 2",
          description: "short description",
          image_url: "/src/assets/Group 76.png",
          link: "/project-2",
        },
        {
          id: 3,
          title: "PROJECT 3",
          description: "short description",
          image_url: "/src/assets/pus.jpg",
          link: "/project-3",
        },
      ],
    };
  },
  methods: {
    scrollDown() {
      const projectSection = document.getElementById("project");
      projectSection.scrollIntoView({ behavior: "smooth" });
    },
    initLottie() {
      lottie.loadAnimation({
        container: this.$refs.lottieAnimation,
        renderer: "svg",
        loop: true,
        autoplay: true,
        animationData: waveAnimation, // Data animasi JSON
      });
    },
    checkIsMobile() {
      this.isMobile = window.innerWidth <= 900;
    },
    handleMouseEnter() {
      if (this.isMobile) {
        this.autoplay = false;
      }
    },
    handleMouseLeave() {
      if (this.isMobile) {
        this.autoplay = true;
      }
    },
  },
});
</script>

<style>
.q-btn {
  text-transform: none;
}

.landing-page {
  position: relative;
  overflow: hidden;
  /* display: flex;
  flex-direction: column; */
}

.home-section {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: linear-gradient(to bottom, #000000, #365c45);
  position: relative;
}

.project-section {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background-color: #365c45;
  position: relative;
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
  gap: 20px;
}

/* .responsive-carousel .q-carousel-slide {
  display: flex;
  justify-content: center;
  align-items: center;
} */

/* .custom-caption {
    text-align: center;
    padding: 12px;
    color: white;
    background-color: rgba(0, 0, 0, 0.3);
  } */

.q-carousel {
  box-shadow: none;
  background: transparent;
}

/* .carousel-slide {
  display: flex;
  justify-content: center;
  align-items: center;
} */

.mobile-card {
  width: 80vw;
  max-width: 550px;
  height: auto;
  border-radius: 24px;
}

@media (min-width: 700px) {
  .mobile-card {
    width: 80vw;
    max-width: 550px;
  }
}
</style>
