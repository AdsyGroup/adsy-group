<template>
  <q-page
    :class="loading ? 'loading-background' : 'loaded-background'"
    class="card-game q-pa-none"
  >
    <div v-show="loading" class="centered-text">
      <p class="card-game-text text-h3">CARD GAME</p>
    </div>

    <div v-show="!loading">
      <div v-if="!isMobile" class="card-game" style="margin: 50px">
        <q-btn
          rounded
          v-for="(button, index) in buttonCategory"
          :key="index"
          :label="button.label"
          :unelevated="activeButton === index"
          :outline="activeButton !== index"
          :style="{
            'background-color': activeButton === index ? '#fde9cf' : '',
            color: activeButton === index ? '#b2afff' : 'black',
          }"
          class="button-header"
          @click="setActive(index)"
        >
        </q-btn>
      </div>

      <div v-else>
        <div class="q-pa-md" style="margin: 50px 20px; padding: 0px">
          <q-btn-dropdown
            rounded
            unelevated
            label="Card Category"
            dropdown-icon="expand_circle_down"
            class="dropdown-button"
          >
            <q-list>
              <q-item clickable v-close-popup @click="onItemClick">
                <q-item-section>
                  <q-item-label>Couple Card</q-item-label>
                </q-item-section>
              </q-item>

              <q-item clickable v-close-popup @click="onItemClick">
                <q-item-section>
                  <q-item-label>Tarot</q-item-label>
                </q-item-section>
              </q-item>

              <q-item clickable v-close-popup @click="onItemClick">
                <q-item-section>
                  <q-item-label>Truth or Dare</q-item-label>
                </q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>
        </div>
      </div>

      <div class="card-center">
        <transition name="flip" mode="out-in">
          <q-card
            flat
            :key="currentIndex"
            class="text-center card"
            style="
              background-color: #fde9cf;
              width: 554px;
              height: 323px;
              border-radius: 24px;
            "
            @click="nextContent"
          >
            <p class="text-card">
              {{ content[currentIndex].contentText }}
            </p>
          </q-card>
        </transition>

        <transition name="flip" mode="out-in">
          <div
            v-if="!showFront"
            key="back"
            class="card back-card"
            style="background-color: #000000"
          >
            <!-- Back of the card -->
          </div>
        </transition>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  name: "CardGame",
  data() {
    return {
      activeButton: 0,
      loading: true,
      isMobile: false,
      currentIndex: 0,
      showFront: true,
      content: [
        {
          id: 1,
          contentText:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        },
        {
          id: 2,
          contentText: "Halo, ada yang bisa saya bantu?",
        },
        {
          id: 3,
          contentText: "Selamat pagi",
        },
      ],
      buttonCategory: [
        { label: "Couple Card" },
        { label: "Tarot" },
        { label: "Truth or Dare" },
      ],
    };
  },
  mounted() {
    setTimeout(() => {
      this.loading = false;
    }, 2500);
    window.addEventListener("resize", this.checkIsMobile);
  },

  beforeUnmount() {
    window.removeEventListener("resize", this.checkIsMobile);
  },

  methods: {
    setActive(index) {
      this.activeButton = index;
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

    nextContent() {
      this.currentIndex = (this.currentIndex + 1) % this.content.length;
      // console.log(this.currentIndex);
      this.showFront = !this.showFront;
      setTimeout(() => {
        this.currentIndex = (this.currentIndex + 1) % this.content.length;
      }, 300);
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

@media (max-width: 600px) {
  .card-center {
    display: flex;
    font-size: 20px;
    justify-content: center;
    align-items: center;
    height: 50vh;
    margin: 0px 20px;
  }

  .text-card {
    font-size: 5vw;
    margin: 0px;
    color: #b2afff;
    padding: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    font-family: "Fredoka One", sans-serif;
  }

  .card-game-text {
    font-size: 10vw;
  }
}
@media (min-width: 600px) {
  .card-center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
  }

  .text-card {
    font-size: 30px;
    margin: 0px;
    color: #b2afff;
    padding: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    font-family: "Fredoka One", sans-serif;
  }

  .card-game-text {
    font-size: 90px;
  }
}

.q-btn {
  text-transform: none;
}

.dropdown-button {
  background-color: #fde9cf;
  color: #b2afff;
  height: 50px;
  width: 200px;
}

.card-center {
  perspective: 1000px;
  display: flex;
  justify-content: center;
}

.card-wrapper {
  position: relative;
  width: 554px;
  height: 323px;
}

.card {
  width: 100%;
  height: 100%;
  border-radius: 24px;
  backface-visibility: hidden; /* Menyembunyikan bagian belakang kartu saat flipping */
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute; /* Tambahkan ini untuk memastikan elemen berada di posisi yang sama */
}

.front-card {
  transform: rotateY(0deg);
}

.back-card {
  transform: rotateY(180deg);
  background-color: #000000; /* Pastikan ini diterapkan untuk warna hitam */
}

.flip-enter-active,
.flip-leave-active {
  transition: transform 0.6s;
  transform-style: preserve-3d;
}

.flip-enter,
.flip-leave-to {
  transform: rotateY(180deg);
}
</style>
