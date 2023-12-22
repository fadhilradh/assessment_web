function parseJsonForChart(jsonData) {
  if (!Array.isArray(jsonData) || jsonData.length === 0) {
    console.error("Invalid JSON data");
    return null;
  }

  // Extract keys from the first object in the array
  const keys = Object.keys(jsonData[0]);

  // Assuming the first key is the label and the rest are dataset keys
  const labelKey = keys[0];
  const datasetKeys = keys.slice(1);

  // Extract labels and datasets from JSON data
  const labels = jsonData.map((entry) => entry[labelKey]);
  const datasets = datasetKeys.map((key) => ({
    label: key,
    data: jsonData.map((entry) => parseFloat(entry[key])),
  }));

  // Return a format suitable for Chart.js
  return {
    labels: labels,
    datasets: datasets,
  };
}
