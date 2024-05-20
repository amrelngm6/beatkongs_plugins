const { useState } = wp.element;
const { apiFetch } = wp;

const UploadBeat = () => {
    const [beatTitle, setBeatTitle] = useState('');
    const [beatPrice, setBeatPrice] = useState('');
    const [beatDescription, setBeatDescription] = useState('');
    const [beatFile, setBeatFile] = useState(null);
    const [message, setMessage] = useState('');

    const handleFileChange = (e) => {
        setBeatFile(e.target.files[0]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (!beatFile) {
            setMessage('Please select a beat file to upload.');
            return;
        }

        const formData = new FormData();
        formData.append('beat_title', beatTitle);
        formData.append('beat_price', beatPrice);
        formData.append('beat_description', beatDescription);
        formData.append('beat_file', beatFile);

        try {
            const response = await apiFetch({
                path: '/custom/v1/upload-beat',
                method: 'POST',
                body: formData,
            });
            setMessage(response.message);
        } catch (error) {
            setMessage('Error uploading beat: ' + error.message);
        }
    };

    return (
        <div className="upload-beat-container">
            <h1>Upload Beat</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label htmlFor="beatTitle">Beat Title</label>
                    <input
                        type="text"
                        id="beatTitle"
                        value={beatTitle}
                        onChange={(e) => setBeatTitle(e.target.value)}
                        required
                    />
                </div>
                <div>
                    <label htmlFor="beatPrice">Price ($)</label>
                    <input
                        type="number"
                        id="beatPrice"
                        value={beatPrice}
                        onChange={(e) => setBeatPrice(e.target.value)}
                        step="0.01"
                        required
                    />
                </div>
                <div>
                    <label htmlFor="beatDescription">Description</label>
                    <textarea
                        id="beatDescription"
                        value={beatDescription}
                        onChange={(e) => setBeatDescription(e.target.value)}
                        required
                    />
                </div>
                <div>
                    <label htmlFor="beatFile">Upload Beat</label>
                    <input
                        type="file"
                        id="beatFile"
                        onChange={handleFileChange}
                        accept="audio/*"
                        required
                    />
                </div>
                <button type="submit">Upload Beat</button>
            </form>
            {message && <p>{message}</p>}
        </div>
    );
};
