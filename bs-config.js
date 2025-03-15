module.exports = {
  proxy: "http://localhost:8000",
  port: 3000,
  files: ["**/*.php", "**/*.html", "**/*.css"],
  ignore: ["./node_modules", "mysql_data/**"],
  notify: false,
  open: true,
  injectChanges: true,
  ghostMode: false,
};
