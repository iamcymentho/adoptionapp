const testimonialsContainer = document.querySelector('.logicaltestimonial-section');

const testimonial = document.querySelector('.testimonial');

const userImage = document.querySelector('.user-image');

const username = document.querySelector('.username');

const role= document.querySelector('.roles');



const testimonials = [

    {
        name: 'Miyah Myles',
        position: 'Birth Parent',
        photo:
        'https://randomuser.me/api/portraits/women/46.jpg',

        text:
           "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga dolores deserunt ipsa unde in repudiandae perspiciatis adipisci a voluptas sapiente suscipit quia aut non quasi sed perferendis, labore dolore. Culpa voluptas ipsa officiis commodi molestias mollitia sed tempora suscipit cumque, cum impedit laboriosam perferendis omnis. Ullam, repudiandae nesciunt. Est tempore distinctio dicta dolorum, debitis sapiente voluptatibus, nemo quis sunt, assumenda beatae! Impedit perferendis delectus, dolore sit vitae minus voluptatem alias!",
    },

    {
     name: 'Jessica Pearson',
        position: 'Adoptive Parent',
        photo:
        'https://randomuser.me/api/portraits/women/47.jpg',

        text:
           "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga dolores deserunt ipsa unde in repudiandae perspiciatis adipisci a voluptas sapiente suscipit quia aut non quasi sed perferendis, labore dolore. Culpa voluptas ipsa officiis commodi molestias mollitia sed tempora suscipit cumque, cum impedit laboriosam perferendis omnis. Ullam, repudiandae nesciunt. Est tempore distinctio dicta dolorum, debitis sapiente voluptatibus, nemo quis sunt, assumenda beatae! Impedit perferendis delectus, dolore sit vitae minus voluptatem alias!",
    },

     {
     name: 'Anna Farewell',
        position: 'Birth Parent',
        photo:
        'https://randomuser.me/api/portraits/women/48.jpg',

        text:
           "Your brand is what other people say about you when you're not in the room.",
    },

     {
     name: 'Loius Litt',
        position: 'Adoptive Parent',
        photo:
        'https://randomuser.me/api/portraits/women/49.jpg',

        text:
           "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga dolores deserunt ipsa unde in repudiandae perspiciatis adipisci a voluptas sapiente suscipit quia aut non quasi sed perferendis, labore dolore. Culpa voluptas ipsa officiis commodi molestias mollitia sed tempora suscipit cumque, cum impedit laboriosam perferendis omnis. Ullam, repudiandae nesciunt. Est tempore distinctio dicta dolorum, debitis sapiente voluptatibus, nemo quis sunt, assumenda beatae! Impedit perferendis delectus, dolore sit vitae minus voluptatem alias!",
    },

    {
     name: 'AnnaBella Farewell',
        position: 'Birth Parent',
        photo:
        'https://randomuser.me/api/portraits/women/50.jpg',

        text:
           "Your brand is what other people say about you when you're not in the room.",
    },

]

let idx = 1;

function updateTestimonial(){
   const{name, position, photo, text} = testimonials[idx]

   testimonial.innerHTML = text;
   userImage.src = photo;
   username.innerHTML = name;
   role.innerHTML = position;

   idx++

   if (idx > testimonials.length -1) {
        idx = 0;
   }
}

setInterval(updateTestimonial, 10000)