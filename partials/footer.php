</div>
    <script>
        let isLoading = false;

        async function encodeToBinary() {
            if (isLoading) return;

            const textInput = document.getElementById("textInput");
            const binaryOutput = document.getElementById("binaryOutput");
            const text = textInput.value.trim();

            if (!text) {
                setStatus("Please enter some text.", "error");
                textInput.focus();
                return;
            }

            setLoading(true, "Encoding...");

            try {
                const response = await fetch("/api/binary/encode", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ text })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.error || data.message || "Encoding failed");
                }

                binaryOutput.value = data.binary;
                setStatus(`Encoded ${text.length} character(s) successfully.`, "success");
            } catch (error) {
                console.error(error);
                setStatus(error.message || "Something went wrong while encoding.", "error");
            } finally {
                setLoading(false);
            }
        }

        async function decodeFromBinary() {
            if (isLoading) return;

            const binaryOutput = document.getElementById("binaryOutput");
            const textInput = document.getElementById("textInput");
            let binary = binaryOutput.value.trim();

            if (!binary) {
                setStatus("Please enter binary data.", "error");
                binaryOutput.focus();
                return;
            }

            setLoading(true, "Decoding...");

            try {
                const response = await fetch("/api/binary/decode", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({ binary })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.error || data.message || "Decoding failed");
                }

                textInput.value = data.text;
                setStatus(`Decoded ${data.text.length} character(s) successfully.`, "success");
            } catch (error) {
                console.error(error);
                setStatus(error.message || "Something went wrong while decoding.", "error");
            } finally {
                setLoading(false);
            }
        }

        function copyBinary() {
            const binaryOutput = document.getElementById("binaryOutput");

            if (!binaryOutput.value.trim()) {
                setStatus("Nothing to copy.", "error");
                return;
            }

            binaryOutput.select();
            binaryOutput.setSelectionRange(0, 99999);

            try {
                navigator.clipboard.writeText(binaryOutput.value).then(() => {
                    setStatus("Binary copied to clipboard!", "success");
                }).catch(() => {
                    document.execCommand("copy");
                    setStatus("Binary copied to clipboard!", "success");
                });
            } catch (err) {
                document.execCommand("copy");
                setStatus("Binary copied to clipboard!", "success");
            }
        }

        function clearAll() {
            document.getElementById("textInput").value = "";
            document.getElementById("binaryOutput").value = "";
            setStatus("Cleared.", "success");
            document.getElementById("textInput").focus();
        }

        function setStatus(msg, type = "success") {
            const el = document.getElementById("status");
            el.textContent = msg;

            el.className = type === "error"
                ? "text-xs text-red-400 h-4"
                : type === "loading"
                    ? "text-xs text-yellow-400 h-4"
                    : "text-xs text-emerald-400 h-4";
        }

        function setLoading(state, message = "Processing...") {
            isLoading = state;

            const buttons = document.querySelectorAll("button");
            buttons.forEach(btn => {
                btn.disabled = state;
                btn.classList.toggle("opacity-60", state);
                btn.classList.toggle("cursor-not-allowed", state);
            });

            if (state) {
                setStatus(message, "loading");
            }
        }

        document.addEventListener("keydown", (e) => {
            // Ctrl + Enter → Encode
            if (e.ctrlKey && e.key === "Enter") {
                e.preventDefault();
                encodeToBinary();
            }

            // Ctrl + Shift + Enter → Decode
            if (e.ctrlKey && e.shiftKey && e.key === "Enter") {
                e.preventDefault();
                decodeFromBinary();
            }
        });
    </script>
</body>
</html>
