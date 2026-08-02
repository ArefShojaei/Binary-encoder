<?php include_once dirname(__DIR__) . "/partials/header.php"; ?>
        <!-- Content -->
        <div class="p-6 space-y-6">

            <!-- Text → Binary -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Text Input</label>
                <textarea
                id="textInput"
                rows="4"
                placeholder="Type or paste text here..."
                class="w-full bg-dark-900 border border-slate-600 rounded-xl px-4 py-3 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none font-mono text-sm"
                ></textarea>
                <div class="flex gap-3 mt-3">
                <button
                    onclick="encodeToBinary()"
                    class="flex-1 bg-indigo-600 hover:bg-indigo-500 text-white font-medium py-2.5 rounded-xl transition-colors"
                >
                    Encode to Binary
                </button>
                <button
                    onclick="clearAll()"
                    class="px-5 bg-slate-700 hover:bg-slate-600 text-slate-200 font-medium py-2.5 rounded-xl transition-colors"
                >
                    Clear
                </button>
                </div>
            </div>

            <!-- Binary Output / Input -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Binary</label>
                <textarea
                id="binaryOutput"
                rows="5"
                placeholder="Binary will appear here..."
                class="w-full bg-dark-900 border border-slate-600 rounded-xl px-4 py-3 text-green-400 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none font-mono text-sm leading-relaxed"
                ></textarea>
                <div class="flex gap-3 mt-3">
                <button
                    onclick="decodeFromBinary()"
                    class="flex-1 bg-emerald-600 hover:bg-emerald-500 text-white font-medium py-2.5 rounded-xl transition-colors"
                >
                    Decode to Text
                </button>
                <button
                    onclick="copyBinary()"
                    class="px-5 bg-slate-700 hover:bg-slate-600 text-slate-200 font-medium py-2.5 rounded-xl transition-colors"
                >
                    Copy
                </button>
                </div>
            </div>

            <!-- Status -->
            <p id="status" class="text-xs text-slate-500 h-4"></p>
        </div>
<?php include_once dirname(__DIR__) . "/partials/footer.php"; ?>
