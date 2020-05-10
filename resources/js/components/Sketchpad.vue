<template>
    <div class="container">
        <div class="row col-md-12">
            <section>
                <div class="row">
                    <div class="two-thirds column">
                        <div id="sketchpad"></div>
                            <em>Try resizing the window!</em>
                        </div>
                    <div class="one-third column">
                        <label for="line-color-input">Set Line Color</label>
                        <input class="u-full-width" type="text" value="#000000" id="line-color-input">
                        <label for="line-size-input">Set Line Size</label>
                        <input class="u-full-width" type="number" value="5" id="line-size-input">
                        <div class="row">
                            <div class="one-half column">
                                <button class="u-full-width" id="undo">Undo</button>
                            </div>
                            <div class="one-half column">
                                <button class="u-full-width" id="redo">Redo</button>
                            </div>
                            <button class="u-full-width" id="clear">Clear</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {

        }
    },
    mounted () {
        const script = document.createElement('script')
        script.setAttribute('src', '../js/responsive-sketchpad.js')
        document.head.appendChild(script)
    },
    created () {
        this.loadSketchPad()
    },
    methods: {
        loadSketchPad () {
            const el = document.getElementById('sketchpad')
            const pad = new Sketchpad(el)

            // setLineColor
            function setLineColor (e) {
                const color = e.target.value
                if (!color.startsWith('#')) {
                    color = '#' + color
                }
                pad.setLineColor(color)
            }
            document.getElementById('line-color-input').oninput = setLineColor

            // setLineSize
            function setLineSize (e) {
                const size = e.target.value
                pad.setLineSize(size)
            }
            document.getElementById('line-size-input').oninput = setLineSize

            // undo
            function undo () {
                pad.undo()
            }
            document.getElementById('undo').onclick = undo

            // redo
            function redo () {
                pad.redo()
            }
            document.getElementById('redo').onclick = redo

            // clear
            function clear () {
                pad.clear()
            }
            document.getElementById('clear').onclick = clear

            // resize
            window.onresize = function (e) {
                pad.resize(el.offsetWidth)
            }
        }
    }
}
</script>

<style scoped>
  
</style>
