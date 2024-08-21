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
       <!-- TAMPILAN MOBILE  -->
       <!-- :autoplay="true" -->

        <q-carousel
          v-if="isMobile"
          animated
          v-model="slide"
          navigation
          infinite
          arrows
          swipeable
          transition-prev="slide-right"
          transition-next="slide-left"
          class="mobile-carousel"
        >
          <q-carousel-slide
            v-for="project in projects"
            :key="project.id"
            :name="project.id"
          >
            <q-card
              class="my-card"
              flat
              bordered
              @click="$router.push(project.link)"
            >
              <img :src="project.image_url" class="carousel-img" />
              <q-card-actions class="carousel-actions">
                <p class="text-bold">{{ project.title }}</p>
                <q-btn flat rounded class="text-caption">{{
                  project.description
                }}</q-btn>
              </q-card-actions>
            </q-card>
          </q-carousel-slide>
        </q-carousel>

        <!-- TAMPILAN PC -->
        <div v-else class="row desktop-grid">
          <q-card
            v-for="project in projects"
            :key="project.id"
            class="my-card q-col-12 q-col-sm-6 q-col-md-4"
            flat
            bordered
            @click="$router.push(project.link)"
          >
            <img :src="project.image_url" class="desktop-img" />
            <q-card-actions class="desktop-actions">
              <p class="text-bold" style="margin: 5px 10px">{{ project.title }}</p>
              <q-btn flat rounded class="text-caption">{{
                project.description
              }}</q-btn>
            </q-card-actions>
          </q-card>
        </div>
      </div>
      <!-- <div class="column">
        <p class="text-h4 text-bold" style="color: white">PROJECTS</p>
        <div class="row">
          <q-card
            v-for="project in projects"
            :key="project.id"
            class="my-card"
            flat
            bordered
            @click="$router.push(project.link)"
          >
            <img :src="project.image_url" />

            <q-card-actions style="justify-content: space-between">
              <p class="text-bold" style="margin: 7px 5px">
                {{ project.title }}
              </p>
              <q-btn
                flat
                rounded
                class="text-caption"
                style="margin: 7px 5px"
                >{{ project.description }}</q-btn
              >
            </q-card-actions>
          </q-card>
        </div>
      </div> -->
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
    window.addEventListener("resize", this.checkIsMobile);
  },

  beforeUnmount() {
    window.removeEventListener("resize", this.checkIsMobile);
  },
  data() {
    return {
      slide: 1,
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
          image_url: "/src/assets/Group 77.png",
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
        container: this.$refs.lottieAnimation, // Elemen DOM di mana animasi akan dimuat
        renderer: "svg",
        loop: true,
        autoplay: true,
        animationData: waveAnimation, // Data animasi JSON
      });
    },
    checkIsMobile() {
      this.isMobile = window.innerWidth <= 600;
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

.responsive-carousel .q-carousel-slide {
  display: flex;
  justify-content: center;
  align-items: center;
}

@media (max-width: 600px) {
  .carousel-img {
    width: 100%;
    height: auto;
  }
  .carousel-actions {
    display: none;
  }
}

@media (min-width: 601px) {
  .carousel-img {
    width: auto;
    height: 200px;
  }
  .carousel-actions {
    display: flex;
    justify-content: space-between;
  }
}
</style>
