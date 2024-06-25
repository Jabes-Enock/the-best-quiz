/** @type {import('tailwindcss').Config} */


module.exports = {
  mode: 'jit',
  content: [
    './*/Views/**/*.php',
    './*/Views/*.php',
    './*/Cells/*.php',
    './*/Cells/Home/*.php',
    './*/Cells/About/*.php',
    './*/Cells/Contact/*.php',
    './*/Controllers/*.php',
  ],
  theme: {
  },
  plugins: [],
}

