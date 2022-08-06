var unitlist = ["", "K", "M", "G"];
function formatnumber(number) {
  let sign = Math.sign(number);
  let unit = 0;
  while (Math.abs(number) > 1000) {
    unit = unit + 1;
    number = Math.floor(Math.abs(number) / 100) / 10;
  }
  return sign * number + unitlist[unit];
}
console.log("hello");

for (const snumber of document.getElementsByClassName("status-number")) {
  snumber.innerHTML = formatnumber(Number(snumber.innerHTML));
}

for (const createdTime of document.getElementsByClassName("time-ago")) {
  console.log("heee");
  createdTime.innerHTML = timeAgo(createdTime.innerHTML);
}
function timeAgo(input) {
  const date = input instanceof Date ? input : new Date(input);
  const formatter = new Intl.RelativeTimeFormat("en");
  const ranges = {
    years: 3600 * 24 * 365,
    months: 3600 * 24 * 30,
    weeks: 3600 * 24 * 7,
    days: 3600 * 24,
    hours: 3600,
    minutes: 60,
    seconds: 1,
  };
  const secondsElapsed = (date.getTime() - Date.now()) / 1000;
  for (let key in ranges) {
    if (ranges[key] < Math.abs(secondsElapsed)) {
      const delta = secondsElapsed / ranges[key];
      return formatter.format(Math.round(delta), key);
    }
  }
}
